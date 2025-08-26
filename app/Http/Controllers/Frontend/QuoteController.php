<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Models\VehicleMakeModel;
use Illuminate\Support\Facades\DB;
use App\Models\QuoteLocation;
use App\Models\QuotePhone;

class QuoteController extends Controller
{
    public function index()
    {
        return view('site.quote.index');
    }
    public function car()
    {
        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');

        return view('site.quote.car', compact('makes'));
    }
    public function motorcycle()
    {
        return view('site.quote.motorcycle');
    }
    public function golf_cart()
    {
        return view('site.quote.golf_cart');
    }
    public function atv_utv()
    {
        return view('site.quote.atv_utv');
    }
    public function boat()
    {
        return view('site.quote.boat');
    }
    public function heavyEquipment()
    {
        return view('site.quote.heavyEquipment');
    }
    public function freight()
    {
        return view('site.quote.freight');
    }
    public function roro()
    {
        return view('site.quote.roro');
    }
    public function recreationalVehicle()
    {
        return view('site.quote.rv');
    }
    public function quoteForm()
    {
        return view('site.quote.quote_form');
    }
    public function commercialTruck()
    {
        return view('site.quote.commercial_truck');
    }
    public function constructionTransport()
    {
        return view('site.quote.construction_transport');
    }
    public function excavator()
    {
        return view('site.quote.excavator');
    }
    public function farmTransport()
    {
        return view('site.quote.farm_transport');
    }
    public function rvTransport()
    {
        return view('site.quote.rv_transport');
    }

    public function getModels(Request $request)
    {
        $make = $request->query('make');
        if (!$make) {
            return response()->json([]);
        }

        $models = VehicleMakeModel::where('make', $make)
            ->distinct()
            ->orderBy('model')
            ->pluck('model');

        return response()->json($models);
    }

    public function submitQuote(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'vehicle_type' => 'nullable|string|max:255',

            // Locations
            'locations' => 'nullable|array',
            'locations.*.type' => 'required_with:locations|in:pickup,delivery',
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
            // ✅ Build locations array
            $locations = [];

            if (!empty($validated['locations'])) {
                $locations = $validated['locations'];
            } else {
                // ✅ Fallback from single-line fields
                if ($request->filled('pickup_location')) {
                    $pickupParts = explode(',', $request->input('pickup_location'));
                    $locations[] = [
                        'type' => 'pickup',
                        'city' => trim($pickupParts[0] ?? ''),
                        'state' => trim($pickupParts[1] ?? ''),
                        'zip' => trim($pickupParts[2] ?? ''),
                        'contact_name' => $request->input('customer_name'),
                        'contact_email' => $request->input('customer_email'),
                        'contact_phone' => [$request->input('customer_phone')],
                    ];
                }

                if ($request->filled('delivery_location')) {
                    $deliveryParts = explode(',', $request->input('delivery_location'));
                    $locations[] = [
                        'type' => 'delivery',
                        'city' => trim($deliveryParts[0] ?? ''),
                        'state' => trim($deliveryParts[1] ?? ''),
                        'zip' => trim($deliveryParts[2] ?? ''),
                        'contact_phone' => [],
                    ];
                }
            }

            $pickupContact = collect($locations)->firstWhere('type', 'pickup');
            $customerName = $pickupContact['contact_name'] ?? null;
            $customerEmail = $pickupContact['contact_email'] ?? null;
            $customerPhone = !empty($pickupContact['contact_phone'])
                ? implode(',', $pickupContact['contact_phone'])
                : null;

            // ✅ Create quote
            $quote = Quote::create([
                'category_id' => $validated['category_id'] ?? null,
                'subcategory_id' => $validated['subcategory_id'] ?? null,
                'vehicle_type' => $validated['vehicle_type'] ?? null,

                'pickup_date' => $validated['dates']['pickup_date'] ?? null,
                'delivery_date' => $validated['dates']['delivery_date'] ?? null,
                'available_date' => $validated['dates']['available_date'] ?? null,
                'expiration_date' => $validated['dates']['expiration_date'] ?? null,

                'customer_name' => $customerName,
                'customer_email' => $customerEmail,
                'customer_phone' => $customerPhone,

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

            // ✅ Save locations
            foreach ($locations as $locationData) {
                $location = $quote->locations()->create([
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
                ]);

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

            // ✅ Save vehicles and images
            foreach ($validated['vehicles'] as $index => $vehicleData) {
                $vehicle = $quote->vehicles()->create([
                    'type' => $vehicleData['type'] ?? null,
                    'year' => $vehicleData['year'] ?? null,
                    'make' => $vehicleData['make'] ?? null,
                    'model' => $vehicleData['model'] ?? null,
                    'color' => $vehicleData['color'] ?? null,
                    'vin' => $vehicleData['vin'] ?? null,
                    'lot_number' => $vehicleData['lot_number'] ?? null,
                    'license_plate' => $vehicleData['license_plate'] ?? null,
                    'license_state' => $vehicleData['license_state'] ?? null,
                ]);

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

            DB::commit();

            // return redirect()->route('dashboard.quotes.index')->with('success', 'Quote submitted successfully');
            return redirect()->back()->with('success', 'Quote submitted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to submit quote: ' . $e->getMessage()])->withInput();
        }
    }
}
