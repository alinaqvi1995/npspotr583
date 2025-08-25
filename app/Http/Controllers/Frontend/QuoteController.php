<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Vehicle;
use App\Models\VehicleImage;
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
        return view('site.quote.car');
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
    // public function submitQuote(Request $request)
    // {
    //     try {
    //         // Validate request
    //         $request->validate([
    //             'category_id' => 'nullable|exists:categories,id',
    //             'subcategory_id' => 'nullable|exists:subcategories,id',
    //             'vehicle_type' => 'nullable|string|max:255',
    //             'pickup_location' => 'nullable|string|max:255',
    //             'delivery_location' => 'nullable|string|max:255',
    //             'pickup_date' => 'nullable|date|after_or_equal:' . date('Y-m-d'),
    //             'delivery_date' => 'nullable|date|after_or_equal:pickup_date',
    //             'customer_name' => 'nullable|string|max:255',
    //             'customer_email' => 'nullable|email|max:255',
    //             'customer_phone' => 'nullable|string|max:50',
    //             'additional_info' => 'nullable|string',
    //             'vehicles' => 'nullable|array|min:1',
    //             'vehicles.*.make' => 'required_with:vehicles|string|max:255',
    //             'vehicles.*.model' => 'required_with:vehicles|string|max:255',
    //             'vehicles.*.year' => 'required_with:vehicles|integer',
    //             'vehicles.*.color' => 'nullable|string|max:50',
    //             'vehicles.*.vin' => 'nullable|string|max:50',
    //             'vehicles.*.length_ft' => 'nullable|integer',
    //             'vehicles.*.length_in' => 'nullable|integer',
    //             'vehicles.*.width_ft' => 'nullable|integer',
    //             'vehicles.*.width_in' => 'nullable|integer',
    //             'vehicles.*.height_ft' => 'nullable|integer',
    //             'vehicles.*.height_in' => 'nullable|integer',
    //             'vehicles.*.weight' => 'nullable|numeric',
    //             'vehicles.*.condition' => 'nullable|in:Running,Non-Running',
    //             'vehicles.*.modified' => 'nullable|boolean',
    //             'vehicles.*.modified_info' => 'nullable|string',
    //             'vehicles.*.available_at_auction' => 'nullable|boolean',
    //             'vehicles.*.available_link' => 'nullable|string|max:255',
    //             'vehicles.*.trailer_type' => 'nullable|string|max:100',
    //             'vehicles.*.load_method' => 'nullable|string|max:100',
    //             'vehicles.*.unload_method' => 'nullable|string|max:100',
    //             'vehicles.*.type' => 'nullable|in:car,heavy',
    //             'vehicles.*.images' => 'nullable|array',
    //             'vehicles.*.images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
    //         ]);

    //         $quote = Quote::create(array_merge(
    //             $request->only([
    //                 'category_id',
    //                 'subcategory_id',
    //                 'vehicle_type',
    //                 'pickup_location',
    //                 'delivery_location',
    //                 'pickup_date',
    //                 'delivery_date',
    //                 'customer_name',
    //                 'customer_email',
    //                 'customer_phone',
    //                 'additional_info'
    //             ]),
    //             ['status' => 'New']
    //         ));

    //         if ($request->filled('vehicles')) {
    //             foreach ($request->vehicles as $index => $vehicleData) {
    //                 $vehicleData['quote_id'] = $quote->id;
    //                 $vehicle = Vehicle::create($vehicleData);

    //                 $vehicleImages = $request->file("images.$index");
    //                 if ($vehicleImages) {
    //                     foreach ($vehicleImages as $image) {
    //                         $filename = time() . '_' . $image->getClientOriginalName();
    //                         $image->move(public_path('quote/vehicle_images'), $filename);
    //                         VehicleImage::create([
    //                             'quote_id' => $quote->id,
    //                             'vehicle_id' => $vehicle->id,
    //                             'image_path' => 'quote/vehicle_images/' . $filename,
    //                         ]);
    //                     }
    //                 }
    //             }
    //         }

    //         return redirect()->back()->with('success', 'Quote submitted successfully!');
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         return redirect()->back()
    //             ->withInput()
    //             ->with('error', 'Validation failed.')
    //             ->with('validation_errors', $e->errors());
    //     } catch (\Exception $e) {
    //         return redirect()->back()
    //             ->withInput()
    //             ->with('error', 'Something went wrong: ' . $e->getMessage());
    //     }
    // }

    public function submitQuote(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'vehicle_type' => 'nullable|string|max:255',

            // Locations
            'locations' => 'required|array|min:1',
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
            'vehicles.*.year' => 'nullable|string|max:10',
            'vehicles.*.make' => 'nullable|string|max:50',
            'vehicles.*.model' => 'nullable|string|max:50',
            'vehicles.*.vin' => 'nullable|string|max:50',
            'vehicles.*.lot_number' => 'nullable|string|max:50',
            'vehicles.*.license_plate' => 'nullable|string|max:50',
            'vehicles.*.license_state' => 'nullable|string|max:50',

            // Dates
            'dates.pickup_date' => 'nullable|date',
            'dates.delivery_date' => 'nullable|date',
            'dates.available_date' => 'nullable|date',
            'dates.expiration_date' => 'nullable|date',

            // Pricing
            'pricing.amount' => 'nullable|numeric',
            'pricing.amount_to_pay_carrier' => 'nullable|numeric',
            'pricing.cop_cod' => 'nullable|string|max:50',
            'pricing.cop_cod_amount' => 'nullable|numeric',
            'pricing.balance' => 'nullable|numeric',
            'pricing.balance_amount' => 'nullable|numeric',

            // Additional Info
            'additional_info.load_id' => 'nullable|string|max:255',
            'additional_info.pre_dispatch_notes' => 'nullable|string',
            'additional_info.transport_instructions' => 'nullable|string',
            'additional_info.load_terms' => 'nullable|string',

            // Vehicle Images
            'images' => 'nullable|array',
            'images.*.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // images.vehicleIndex.imageIndex
        ]);

        DB::beginTransaction();

        try {
            // ✅ Save main quote
            $quote = Quote::create([
                'category_id' => $validated['category_id'] ?? null,
                'subcategory_id' => $validated['subcategory_id'] ?? null,
                'vehicle_type' => $validated['vehicle_type'] ?? null,

                // Dates
                'pickup_date' => $validated['dates']['pickup_date'] ?? null,
                'delivery_date' => $validated['dates']['delivery_date'] ?? null,
                'available_date' => $validated['dates']['available_date'] ?? null,
                'expiration_date' => $validated['dates']['expiration_date'] ?? null,

                // Pricing
                'amount' => $validated['pricing']['amount'] ?? null,
                'amount_to_pay_carrier' => $validated['pricing']['amount_to_pay_carrier'] ?? null,
                'cop_cod' => $validated['pricing']['cop_cod'] ?? null,
                'cop_cod_amount' => $validated['pricing']['cop_cod_amount'] ?? null,
                'balance' => $validated['pricing']['balance'] ?? null,
                'balance_amount' => $validated['pricing']['balance_amount'] ?? null,

                // Additional Info
                'load_id' => $validated['additional_info']['load_id'] ?? null,
                'pre_dispatch_notes' => $validated['additional_info']['pre_dispatch_notes'] ?? null,
                'transport_special_instructions' => $validated['additional_info']['transport_instructions'] ?? null,
                'load_specific_terms' => $validated['additional_info']['load_terms'] ?? null,
            ]);

            // ✅ Save Locations
            foreach ($validated['locations'] as $locationData) {
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

            // ✅ Save Vehicles & Images
            foreach ($validated['vehicles'] as $index => $vehicleData) {
                $vehicle = $quote->vehicles()->create([
                    'year' => $vehicleData['year'] ?? null,
                    'make' => $vehicleData['make'] ?? null,
                    'model' => $vehicleData['model'] ?? null,
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

            // return response()->json([
            //     'status' => 'success',
            //     'message' => 'Quote submitted successfully',
            //     'quote_id' => $quote->id
            // ], 201);
            return redirect()->route('dashboard.quotes.index')->with('success', 'Quote submitted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            // return response()->json([
            //     'status' => 'error',
            //     'message' => 'Failed to submit quote',
            //     'error' => $e->getMessage()
            // ], 500);
            return redirect()->back()->withErrors(['error' => 'Failed to submit quote: ' . $e->getMessage()])->withInput();
        }
    }
}
