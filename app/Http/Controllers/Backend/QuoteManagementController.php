<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\VehicleMakeModel;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Models\QuoteLocation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class QuoteManagementController extends Controller
{
    public function __construct()
    {
        $permissions = [
            'allQuotes'   => 'view-quotes',
            'quoteDetail'   => 'view-quoteDetail',
        ];

        foreach ($permissions as $method => $permission) {
            $this->middleware("permission:{$permission}")->only($method);
        }
    }

    public function allQuotes(Request $request)
    {
        $query = Quote::with('vehicles.images')
            ->orderBy('created_at', 'desc');

        if ($request->has('status') && !empty($request->status)) {
            $status = Str::title(str_replace('-', ' ', $request->status));
            $query->where('status', $status);
        }

        $quotes = $query->paginate(10);

        return view('dashboard.quote.index', compact('quotes'));
    }

    public function quoteDetail($id)
    {
        $quote = Quote::with('vehicles.images')->findOrFail($id);
        return view('dashboard.quote.details', compact('quote'));
    }

    // public function quoteCreate()
    // {
    //     $makes = [];
    //     $models = [];

    //     VehicleMakeModel::select('make', 'model')
    //         ->orderBy('make')
    //         ->chunk(500, function ($rows) use (&$makes, &$models) {
    //             foreach ($rows as $row) {
    //                 if (!in_array($row->make, $makes)) {
    //                     $makes[] = $row->make;
    //                 }
    //                 $models[$row->make][] = $row->model;
    //             }
    //         });

    //     return view('dashboard.quote.create', compact('makes', 'models'));
    // }

    public function quoteCreate()
    {
        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');

        return view('dashboard.quote.create', compact('makes'));
    }

    public function quoteEdit($id)
    {
        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');

        $quote = Quote::with(['locations', 'vehicles.images'])->findOrFail($id);

        return view('dashboard.quote.edit', compact('makes', 'quote'));
    }

    public function invoice()
    {
        return view('dashboard.invoice.index');
    }

    public function quoteUpdate(Request $request, Quote $quote)
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'vehicle_type' => 'nullable|string|max:255',

            // Locations
            'locations' => 'required|array|min:1',
            'locations.*.id' => 'nullable|exists:quote_locations,id',
            'locations.*.type' => 'required|in:pickup,delivery',
            'locations.*.name' => 'nullable|string|max:255',
            'locations.*.location_type' => 'nullable|string|max:255',
            'locations.*.address1' => 'nullable|string|max:255',
            'locations.*.address2' => 'nullable|string|max:255',
            'locations.*.city' => 'nullable|string|max:255',
            'locations.*.state' => 'nullable|string|max:255',
            'locations.*.zip' => 'nullable|string|max:20',
            'locations.*.buyer_ref' => 'nullable|string|max:255',
            'locations.*.contact_name' => 'nullable|string|max:255',
            'locations.*.contact_email' => 'nullable|email',
            'locations.*.contact_phone' => 'nullable|array',
            'locations.*.contact_phone.*' => 'nullable|string|max:20',
            'locations.*.twic' => 'nullable|boolean',
            'locations.*.save_to_address_book' => 'nullable|boolean',

            // Vehicles
            'vehicles' => 'required|array|min:1',
            'vehicles.*.id' => 'nullable|exists:vehicles,id',
            'vehicles.*.type' => 'nullable|string|max:50',
            'vehicles.*.year' => 'nullable|string|max:10',
            'vehicles.*.make' => 'nullable|string|max:50',
            'vehicles.*.model' => 'nullable|string|max:50',
            'vehicles.*.color' => 'nullable|string|max:50',
            'vehicles.*.vin' => 'nullable|string|max:50',
            'vehicles.*.lot_number' => 'nullable|string|max:50',
            'vehicles.*.license_plate' => 'nullable|string|max:50',
            'vehicles.*.license_state' => 'nullable|string|max:50',

            // Dates
            'dates.pickup_date' => 'nullable|date',
            'dates.delivery_date' => 'nullable|date',
            'dates.available_date' => 'nullable|date',
            'dates.expiration_date' => 'nullable|date',
            'dates.desired_delivery_date' => 'nullable|date',

            // Pricing
            'pricing.amount_to_pay' => 'nullable|numeric',
            'pricing.amount_to_pay_carrier' => 'nullable|numeric',
            'pricing.cop_cod' => 'nullable|string|max:50',
            'pricing.cop_cod_amount' => 'nullable|numeric',
            'pricing.balance' => 'nullable|numeric',
            'pricing.balance_amount' => 'nullable|numeric',

            // Additional Info
            'additional.load_id' => 'nullable|string|max:255',
            'additional.pre_dispatch_notes' => 'nullable|string',
            'additional.special_instructions' => 'nullable|string',
            'additional.load_terms' => 'nullable|string',

            // Vehicle Images
            'images' => 'nullable|array',
            'images.*.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // --- Update main quote ---
            $quote->update([
                'category_id' => $validated['category_id'] ?? null,
                'subcategory_id' => $validated['subcategory_id'] ?? null,
                'vehicle_type' => $validated['vehicle_type'] ?? null,
                'pickup_date' => $validated['dates']['pickup_date'] ?? null,
                'delivery_date' => $validated['dates']['delivery_date'] ?? null,
                'available_date' => $validated['dates']['available_date'] ?? null,
                'expiration_date' => $validated['dates']['expiration_date'] ?? null,
                'customer_name' => $validated['locations'][1]['contact_name'] ?? null,
                'customer_email' => $validated['locations'][1]['contact_email'] ?? null,
                'customer_phone' => !empty($validated['locations'][1]['contact_phone']) ? implode(',', $validated['locations'][1]['contact_phone']) : null,
                'additional_info' => json_encode($validated['additional'] ?? []),
                'load_id' => $validated['additional']['load_id'] ?? null,
                'pre_dispatch_notes' => $validated['additional']['pre_dispatch_notes'] ?? null,
                'transport_special_instructions' => $validated['additional']['special_instructions'] ?? null,
                'load_specific_terms' => $validated['additional']['load_terms'] ?? null,
                'amount_to_pay' => $validated['pricing']['amount_to_pay'] ?? null,
                'cop_cod' => $validated['pricing']['cop_cod'] ?? null,
                'cop_cod_amount' => $validated['pricing']['cop_cod_amount'] ?? null,
                'balance' => $validated['pricing']['balance'] ?? null,
                'balance_amount' => $validated['pricing']['balance_amount'] ?? null,
            ]);

            // --- Update Locations ---
            $existingLocationIds = $quote->locations()->pluck('id')->toArray();
            $submittedLocationIds = [];

            foreach ($validated['locations'] as $locationData) {
                $location = $quote->locations()->updateOrCreate(
                    ['id' => $locationData['id'] ?? 0],
                    [
                        'quote_id' => $quote->id, // important to avoid NULL
                        'type' => $locationData['type'],
                        'name' => $locationData['name'] ?? null,
                        'location_type' => $locationData['location_type'] ?? null,
                        'address1' => $locationData['address1'] ?? null,
                        'address2' => $locationData['address2'] ?? null,
                        'city' => $locationData['city'] ?? null,
                        'state' => $locationData['state'] ?? null,
                        'zip' => $locationData['zip'] ?? null,
                        'buyer_ref' => $locationData['buyer_ref'] ?? null,
                        'contact_name' => $locationData['contact_name'] ?? null,
                        'contact_email' => $locationData['contact_email'] ?? null,
                        'twic' => $locationData['twic'] ?? false,
                        'save_to_address_book' => $locationData['save_to_address_book'] ?? false,
                    ]
                );

                $submittedLocationIds[] = $location->id;

                // --- Update phones ---
                $location->phones()->delete();
                if (!empty($locationData['contact_phone'])) {
                    foreach ($locationData['contact_phone'] as $phone) {
                        if (!empty($phone)) {
                            $location->phones()->create([
                                'phone' => $phone,
                                'type' => 'contact',
                            ]);
                        }
                    }
                }
            }

            // Optional: Delete removed locations
            $locationsToDelete = array_diff($existingLocationIds, $submittedLocationIds);
            if ($locationsToDelete) {
                QuoteLocation::whereIn('id', $locationsToDelete)->delete();
            }

            // --- Update Vehicles ---
            $existingVehicleIds = $quote->vehicles()->pluck('id')->toArray();
            $submittedVehicleIds = [];

            foreach ($validated['vehicles'] as $index => $vehicleData) {
                $vehicle = $quote->vehicles()->updateOrCreate(
                    ['id' => $vehicleData['id'] ?? 0],
                    [
                        'type' => $vehicleData['type'] ?? null,
                        'year' => $vehicleData['year'] ?? null,
                        'make' => $vehicleData['make'] ?? null,
                        'model' => $vehicleData['model'] ?? null,
                        'color' => $vehicleData['color'] ?? null,
                        'vin' => $vehicleData['vin'] ?? null,
                        'lot_number' => $vehicleData['lot_number'] ?? null,
                        'license_plate' => $vehicleData['license_plate'] ?? null,
                        'license_state' => $vehicleData['license_state'] ?? null,
                    ]
                );
                $submittedVehicleIds[] = $vehicle->id;

                // --- Handle images ---
                if ($request->hasFile("images.$index")) {
                    foreach ($request->file("images.$index") as $image) {
                        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('quote/vehicle_images'), $filename);

                        VehicleImage::create([
                            'quote_id' => $quote->id,
                            'vehicle_id' => $vehicle->id,
                            'image_path' => 'quote/vehicle_images/' . $filename,
                        ]);
                    }
                }
            }

            // Delete removed vehicles
            $vehiclesToDelete = array_diff($existingVehicleIds, $submittedVehicleIds);
            if ($vehiclesToDelete) {
                Vehicle::whereIn('id', $vehiclesToDelete)->delete();
            }

            DB::commit();

            return redirect()->route('dashboard.quotes.index')->with('success', 'Quote updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to update quote: ' . $e->getMessage()])->withInput();
        }
    }
}
