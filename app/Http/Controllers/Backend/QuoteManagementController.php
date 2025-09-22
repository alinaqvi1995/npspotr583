<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\VehicleMakeModel;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Models\QuoteLocation;
use App\Models\QuoteAgentHistory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Encryption\DecryptException;

class QuoteManagementController extends Controller
{
    public function __construct()
    {
        $permissions = [
            'allQuotes'   => 'view-quotes',
            'quoteDetail'   => 'view-quoteDetail',
            'quoteCreate'   => 'create-quotes',
            'quoteUpdate'   => 'edit-quotes',
        ];

        foreach ($permissions as $method => $permission) {
            $this->middleware("permission:{$permission}")->only($method);
        }
    }

    public function allQuotes(Request $request, $status)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        $query = Quote::with('vehicles.images')->orderBy('created_at', 'desc');

        // Normalize requested status (convert "follow-up" => "Follow Up")
        $requestedStatus = Str::title(str_replace('-', ' ', $status));

        if ($user->isAdmin()) {
            // Admins can see any status
            $query->where('status', $requestedStatus);
        } else {
            // Get statuses user is allowed to view
            $allowedPermissions = $user->allPermissions()
                ->filter(fn($perm) => str_starts_with($perm->slug, 'view-quotes-'))
                ->pluck('slug')
                ->toArray();

            $allowedStatuses = collect($allowedPermissions)
                ->map(fn($slug) => Str::title(str_replace('view-quotes-', '', $slug)))
                ->toArray();

            if (!empty($allowedStatuses)) {
                $query->whereIn('status', $allowedStatuses);
            }

            // Restrict further by requested status
            if (in_array($requestedStatus, $allowedStatuses)) {
                $query->where('status', $requestedStatus);
            } else {
                // If requested status is not allowed → return nothing
                $query->whereRaw('0=1');
            }
        }

        // Debug check
        // dd($query->pluck('status')->take(20)->toArray());

        $quotes = $query->paginate(20);

        return view('dashboard.quote.index', compact('quotes'));
    }

    // public function allQuotes(Request $request, $status)
    // {
    //     /** @var \App\Models\User|null $user */
    //     $user = Auth::user();
    //     $query = Quote::with('vehicles.images')->orderBy('created_at', 'desc');

    //     if ($user->isAdmin()) {
    //         if ($request->has('status') && !empty($status)) {
    //             $requestedStatus = Str::title(str_replace('-', ' ', $status));
    //             $query->where('status', $requestedStatus);
    //         }
    //     } else {
    //         $allowedPermissions = $user->allPermissions()
    //             ->filter(fn($perm) => str_starts_with($perm->slug, 'view-quotes-'))
    //             ->pluck('slug')
    //             ->toArray();

    //         $allowedStatuses = collect($allowedPermissions)
    //             ->map(fn($slug) => Str::title(str_replace('view-quotes-', '', $slug)))
    //             ->toArray();

    //         if (!empty($allowedStatuses)) {
    //             $query->whereIn('status', $allowedStatuses);
    //         }

    //         if ($request->has('status') && !empty($status)) {
    //             $requestedStatus = Str::title(str_replace('-', ' ', $status));
    //             if (in_array($requestedStatus, $allowedStatuses)) {
    //                 $query->where('status', $requestedStatus);
    //             } else {
    //                 $query->whereRaw('0=1');
    //             }
    //         }
    //     }

    //     dd($query->pluck('status')->take(20)->toArray());
    //     $quotes = $query->paginate(10);

    //     return view('dashboard.quote.index', compact('quotes'));
    // }

    public function quoteDetail($id)
    {
        $quote = Quote::with('vehicles.images')->findOrFail($id);
        return view('dashboard.quote.details', compact('quote'));
    }

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
            'status' => 'nullable|string|max:255',

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
            'vehicles.*.length_ft' => 'nullable|integer',
            'vehicles.*.length' => 'nullable|integer',
            'vehicles.*.length_in' => 'nullable|integer',
            'vehicles.*.width_ft' => 'nullable|integer',
            'vehicles.*.width' => 'nullable|integer',
            'vehicles.*.width_in' => 'nullable|integer',
            'vehicles.*.height_ft' => 'nullable|integer',
            'vehicles.*.height' => 'nullable|integer',
            'vehicles.*.height_in' => 'nullable|integer',
            'vehicles.*.weight' => 'nullable|numeric',
            'vehicles.*.condition' => 'nullable|in:Running,Non-Running',
            'vehicles.*.modified' => 'nullable|boolean',
            'vehicles.*.modified_info' => 'nullable|string',
            'vehicles.*.available_at_auction' => 'nullable|boolean',
            'vehicles.*.available_link' => 'nullable|url',
            'vehicles.*.trailer_type' => 'nullable|string|max:255',
            'vehicles.*.load_method' => 'nullable|string|max:255',
            'vehicles.*.unload_method' => 'nullable|string|max:255',
            'vehicles.*.delete_images' => 'nullable|array',
            'vehicles.*.delete_images.*' => 'nullable|exists:vehicle_images,id',

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
        ]);

        DB::beginTransaction();

        try {
            // --- Update main quote ---
            $quote->update([
                'category_id' => $validated['category_id'] ?? null,
                'subcategory_id' => $validated['subcategory_id'] ?? null,
                'vehicle_type' => $validated['vehicle_type'] ?? null,
                'status' => $validated['status'] ?? null,
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
                        'quote_id' => $quote->id,
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

                // Update phones
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

            // Delete removed locations
            $locationsToDelete = array_diff($existingLocationIds, $submittedLocationIds);
            if ($locationsToDelete) {
                QuoteLocation::whereIn('id', $locationsToDelete)->delete();
            }

            // --- Update Vehicles ---
            $existingVehicleIds = $quote->vehicles()->pluck('id')->toArray();
            $submittedVehicleIds = [];

            foreach ($validated['vehicles'] as $index => $vehicleData) {
                if (!empty($vehicleData['id'])) {
                    // Update existing
                    $vehicle = Vehicle::find($vehicleData['id']);
                    if ($vehicle) {
                        $vehicle->update([
                            'type' => $vehicleData['type'] ?? null,
                            'year' => $vehicleData['year'] ?? null,
                            'make' => $vehicleData['make'] ?? null,
                            'model' => $vehicleData['model'] ?? null,
                            'color' => $vehicleData['color'] ?? null,
                            'vin' => $vehicleData['vin'] ?? null,
                            'lot_number' => $vehicleData['lot_number'] ?? null,
                            'license_plate' => $vehicleData['license_plate'] ?? null,
                            'license_state' => $vehicleData['license_state'] ?? null,
                            'length_ft' => $vehicleData['length_ft'] ?? $vehicleData['length'] ?? null,
                            'length_in' => $vehicleData['length_in'] ?? null,
                            'width_ft' => $vehicleData['width_ft'] ?? $vehicleData['width'] ?? null,
                            'width_in' => $vehicleData['width_in'] ?? null,
                            'height_ft' => $vehicleData['height_ft'] ?? $vehicleData['height'] ?? null,
                            'height_in' => $vehicleData['height_in'] ?? null,
                            'weight' => $vehicleData['weight'] ?? null,
                            'condition' => $vehicleData['condition'] ?? null,
                            'modified' => isset($vehicleData['modified']) ? (int)$vehicleData['modified'] : 0,
                            'modified_info' => $vehicleData['modified_info'] ?? null,
                            'available_at_auction' => isset($vehicleData['available_at_auction']) ? (int)$vehicleData['available_at_auction'] : 0,
                            'available_link' => $vehicleData['available_link'] ?? null,
                            'trailer_type' => $vehicleData['trailer_type'] ?? null,
                            'load_method' => $vehicleData['load_method'] ?? null,
                            'unload_method' => $vehicleData['unload_method'] ?? null,
                        ]);
                    }
                } else {
                    // Create new
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
                        'length_ft' => $vehicleData['length_ft'] ?? $vehicleData['length'] ?? null,
                        'length_in' => $vehicleData['length_in'] ?? null,
                        'width_ft' => $vehicleData['width_ft'] ?? $vehicleData['width'] ?? null,
                        'width_in' => $vehicleData['width_in'] ?? null,
                        'height_ft' => $vehicleData['height_ft'] ?? $vehicleData['height'] ?? null,
                        'height_in' => $vehicleData['height_in'] ?? null,
                        'weight' => $vehicleData['weight'] ?? null,
                        'condition' => $vehicleData['condition'] ?? null,
                        'modified' => isset($vehicleData['modified']) ? (int)$vehicleData['modified'] : 0,
                        'modified_info' => $vehicleData['modified_info'] ?? null,
                        'available_at_auction' => isset($vehicleData['available_at_auction']) ? (int)$vehicleData['available_at_auction'] : 0,
                        'available_link' => $vehicleData['available_link'] ?? null,
                        'trailer_type' => $vehicleData['trailer_type'] ?? null,
                        'load_method' => $vehicleData['load_method'] ?? null,
                        'unload_method' => $vehicleData['unload_method'] ?? null,
                    ]);
                }

                if ($request->hasFile("vehicles.images.$index")) {
                    foreach ($request->file("vehicles.images.$index") as $imageFile) {
                        $destinationPath = public_path('quote/vehicle_images');
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }

                        $fileName = uniqid() . '_' . time() . '.' . $imageFile->getClientOriginalExtension();
                        $imageFile->move($destinationPath, $fileName);

                        $vehicle->images()->create([
                            'quote_id' => $quote->id,
                            'image_path' => 'quote/vehicle_images/' . $fileName,
                        ]);
                    }
                }

                if (!empty($vehicleData['delete_images'])) {
                    // dd('ys inn');
                    foreach ($vehicleData['delete_images'] as $imageId) {
                        $image = $vehicle->images()->where('id', $imageId)->first();
                        if ($image) {
                            $filePath = public_path($image->image_path);
                            if (file_exists($filePath)) {
                                unlink($filePath);
                            }
                            $image->delete();
                        }
                    }
                }
                // dd('no');

                $submittedVehicleIds[] = $vehicle->id;
            }

            // Delete removed vehicles
            $vehiclesToDelete = array_diff($existingVehicleIds, $submittedVehicleIds);
            if ($vehiclesToDelete) {
                foreach ($vehiclesToDelete as $vehicleId) {
                    $vehicleToDelete = Vehicle::find($vehicleId);
                    if ($vehicleToDelete) {
                        foreach ($vehicleToDelete->images as $img) {
                            $filePath = public_path($img->image_path);
                            if (file_exists($filePath)) {
                                unlink($filePath);
                            }
                        }
                        $vehicleToDelete->images()->delete();
                        $vehicleToDelete->delete();
                    }
                }

                Vehicle::whereIn('id', $vehiclesToDelete)->delete();
            }

            DB::commit();

            return redirect()->route('dashboard.quotes.index', ['status' => $quote->status])->with('success', 'Quote updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to update quote: ' . $e->getMessage()])->withInput();
        }
    }

    public function logs(Quote $quote)
    {
        $logs = $quote->activities()->latest()->get(); // adjust based on logging package
        return view('dashboard.quotes.partials.logs', compact('logs'));
    }

    public function agentHistory(Quote $quote)
    {
        $histories = $quote->agentHistories()->with('user')->latest()->get();
        return view('dashboard.quotes.partials.agent_history', compact('histories'));
    }

    public function storeAgentHistory(Request $request)
    {
        $request->validate([
            'quote_id' => 'required|exists:quotes,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        QuoteAgentHistory::create([
            'quote_id' => $request->quote_id,
            'user_id'  => Auth::id(),
            'title'    => $request->title,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Agent history added!');
    }

    public function histories($quoteId)
    {
        $logs = \App\Models\QuoteHistory::with('user')
            ->where('quote_id', $quoteId)
            ->whereColumn('old_status', '!=', 'status') // only status changes
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($history) {
                return [
                    'id'          => $history->id,
                    'change_type' => ucfirst($history->change_type),
                    'old_status'  => $history->old_status ?: '-',
                    'new_status'  => $history->status ?: '-',
                    'changed_by'  => $history->user?->name ?: 'System',
                    'created_at'  => $history->created_at->format('M d, Y h:i A'),
                ];
            });

        return response()->json(['histories' => $logs]);
    }
}
