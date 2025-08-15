<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Vehicle;
use App\Models\VehicleImage;

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
    public function submitQuote(Request $request)
    {
        try {
            // Validate request
            $request->validate([
                'category_id' => 'nullable|exists:categories,id',
                'subcategory_id' => 'nullable|exists:subcategories,id',
                'vehicle_type' => 'nullable|string|max:255',
                'pickup_location' => 'nullable|string|max:255',
                'delivery_location' => 'nullable|string|max:255',
                'pickup_date' => 'nullable|date|after_or_equal:' . date('Y-m-d'),
                'delivery_date' => 'nullable|date|after_or_equal:pickup_date',
                'customer_name' => 'nullable|string|max:255',
                'customer_email' => 'nullable|email|max:255',
                'customer_phone' => 'nullable|string|max:50',
                'additional_info' => 'nullable|string',
                'vehicles' => 'nullable|array|min:1',
                'vehicles.*.make' => 'required_with:vehicles|string|max:255',
                'vehicles.*.model' => 'required_with:vehicles|string|max:255',
                'vehicles.*.year' => 'required_with:vehicles|integer',
                'vehicles.*.color' => 'nullable|string|max:50',
                'vehicles.*.vin' => 'nullable|string|max:50',
                'vehicles.*.length_ft' => 'nullable|integer',
                'vehicles.*.length_in' => 'nullable|integer',
                'vehicles.*.width_ft' => 'nullable|integer',
                'vehicles.*.width_in' => 'nullable|integer',
                'vehicles.*.height_ft' => 'nullable|integer',
                'vehicles.*.height_in' => 'nullable|integer',
                'vehicles.*.weight' => 'nullable|numeric',
                'vehicles.*.condition' => 'nullable|in:Running,Non-Running',
                'vehicles.*.modified' => 'nullable|boolean',
                'vehicles.*.modified_info' => 'nullable|string',
                'vehicles.*.available_at_auction' => 'nullable|boolean',
                'vehicles.*.available_link' => 'nullable|string|max:255',
                'vehicles.*.trailer_type' => 'nullable|string|max:100',
                'vehicles.*.load_method' => 'nullable|string|max:100',
                'vehicles.*.unload_method' => 'nullable|string|max:100',
                'vehicles.*.type' => 'nullable|in:car,heavy',
                'vehicles.*.images' => 'nullable|array',
                'vehicles.*.images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            ]);

            // Create the quote
            $quote = Quote::create($request->only([
                'category_id',
                'subcategory_id',
                'vehicle_type',
                'pickup_location',
                'delivery_location',
                'pickup_date',
                'delivery_date',
                'customer_name',
                'customer_email',
                'customer_phone',
                'additional_info'
            ]));

            // Handle vehicles and their images
            if ($request->filled('vehicles')) {
                foreach ($request->vehicles as $index => $vehicleData) {
                    $vehicleData['quote_id'] = $quote->id;
                    $vehicle = Vehicle::create($vehicleData);

                    $vehicleImages = $request->file("images.$index");
                    if ($vehicleImages) {
                        foreach ($vehicleImages as $image) {
                            $filename = time() . '_' . $image->getClientOriginalName();
                            $image->move(public_path('quote/vehicle_images'), $filename);
                            VehicleImage::create([
                                'quote_id' => $quote->id,
                                'vehicle_id' => $vehicle->id,
                                'image_path' => 'quote/vehicle_images/' . $filename,
                            ]);
                        }
                    }
                }
            }

            return redirect()->back()->with('success', 'Quote submitted successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Validation failed.')
                ->with('validation_errors', $e->errors());
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
