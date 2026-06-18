<div class="vehicle-item mb-4 border p-3 rounded" data-index="{{ $index }}">
    <h6 class="mb-3">Vehicle #{{ $index }}</h6>
    <div class="row g-3">
        <input type="hidden" name="vehicles[{{ $index }}][id]" value="{{ old("vehicles.$index.id", $vehicle->id) }}">

        <!-- Basic Info -->
        <div class="col-md-3">
            <label class="form-label">Type *</label>
            <select name="vehicles[{{ $index }}][type]" class="form-select vehicle-type-select" required>
                <option value="">Select</option>
                @php $vType = old("vehicles.$index.type", $vehicle->type); @endphp
                <option @selected($vType == 'Car')>Car</option>
                <option @selected($vType == 'Motorcycle')>Motorcycle</option>
                <option @selected($vType == 'Golf Cart')>Golf Cart</option>
                <option @selected($vType == 'ATV')>ATV</option>
                <option @selected($vType == 'Heavy Equipment')>Heavy Equipment</option>
                <option @selected($vType == 'RV Transport')>RV Transport</option>
                <option @selected($vType == 'Boat Transport')>Boat Transport</option>
                <option @selected($vType == 'Other')>Other</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Year</label>
            <select class="form-select year-select" name="vehicles[{{ $index }}][year]"
                data-selected="{{ old("vehicles.$index.year", $vehicle->year) }}">
                <option value="">-- Year --</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Make *</label>
            <div class="make-container">
                @php $vMake = old("vehicles.$index.make", $vehicle->make); @endphp
                <select class="form-select make-select" name="vehicles[{{ $index }}][make]"
                    data-selected="{{ $vMake }}"
                    @if (old("vehicles.$index.type", $vehicle->type) != 'Car') disabled style="display:none" @endif required>
                    <option value="">-- Select Make --</option>
                    @if ($vMake && !$makes->contains($vMake))
                        <option value="{{ $vMake }}" selected>{{ $vMake }}</option>
                    @endif
                    @foreach ($makes as $make)
                        <option value="{{ $make }}" @selected($vMake == $make)>{{ $make }}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control make-input" name="vehicles[{{ $index }}][make]"
                    value="{{ $vMake }}" placeholder="Enter Make"
                    @if (old("vehicles.$index.type", $vehicle->type) == 'Car') disabled style="display:none" @endif required>
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">Model *</label>
            <div class="model-container">
                @php $vModel = old("vehicles.$index.model", $vehicle->model); @endphp
                <select class="form-select model-select" name="vehicles[{{ $index }}][model]"
                    data-selected="{{ $vModel }}"
                    @if (old("vehicles.$index.type", $vehicle->type) != 'Car') disabled style="display:none" @endif required>
                    <option value="">-- Select Model --</option>
                    @if ($vModel)
                        <option value="{{ $vModel }}" selected>{{ $vModel }}</option>
                    @endif
                </select>
                <input type="text" class="form-control model-input" name="vehicles[{{ $index }}][model]"
                    value="{{ $vModel }}" placeholder="Enter Model"
                    @if (old("vehicles.$index.type", $vehicle->type) == 'Car') disabled style="display:none" @endif required>
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">Color</label>
            <input type="text" name="vehicles[{{ $index }}][color]" class="form-control"
                value="{{ old("vehicles.$index.color", $vehicle->color) }}" placeholder="Enter Color">
        </div>
        <div class="col-md-3">
            <label class="form-label">VIN</label>
            <input type="text" name="vehicles[{{ $index }}][vin]" class="form-control"
                value="{{ old("vehicles.$index.vin", $vehicle->vin) }}" placeholder="Enter VIN">
        </div>

        <!-- CONDITIONAL: Show size fields for boats, heavy equipment, RV -->
        <div class="col-md-2">
            <label class="form-label">Length (ft)</label>
            <input type="number" class="form-control" name="vehicles[{{ $index }}][length_ft]"
                value="{{ old("vehicles.$index.length_ft", $vehicle->length_ft) }}">
        </div>
        <div class="col-md-2">
            <label class="form-label">Width (ft)</label>
            <input type="number" class="form-control" name="vehicles[{{ $index }}][width_ft]"
                value="{{ old("vehicles.$index.width_ft", $vehicle->width_ft) }}">
        </div>
        <div class="col-md-2">
            <label class="form-label">Height (ft)</label>
            <input type="number" class="form-control" name="vehicles[{{ $index }}][height_ft]"
                value="{{ old("vehicles.$index.height_ft", $vehicle->height_ft) }}">
        </div>
        <div class="col-md-2">
            <label class="form-label">Weight (lbs)</label>
            <input type="number" class="form-control" name="vehicles[{{ $index }}][weight]"
                value="{{ old("vehicles.$index.weight", $vehicle->weight) }}">
        </div>

        <!-- Condition & Trailer -->
        <div class="col-md-3">
            <label class="form-label">Condition</label>
            <select name="vehicles[{{ $index }}][condition]" class="form-select">
                @php $vCondition = old("vehicles.$index.condition", $vehicle->condition); @endphp
                <option value="Running" @selected($vCondition == 'Running')>Running</option>
                <option value="Non-Running" @selected($vCondition == 'Non-Running')>Non-Running</option>
            </select>
        </div>

        <!-- Trailer Type only for heavy equipment and RV -->
        <div class="col-md-3">
            <label class="form-label">Trailer Type</label>
            <select name="vehicles[{{ $index }}][trailer_type]" class="form-select">
                @php $vTrailer = old("vehicles.$index.trailer_type", $vehicle->trailer_type); @endphp
                <option value="Open Trailer" @selected($vTrailer == 'Open Trailer')>Open Trailer</option>
                <option value="Enclosed Trailer" @selected($vTrailer == 'Enclosed Trailer')>Enclosed Trailer</option>
            </select>
        </div>

        <!-- Booleans -->
        <div class="col-md-2">
            <label class="form-label">Modified</label><br>
            <input type="hidden" name="vehicles[{{ $index }}][modified]" value="0">
            <input type="checkbox" name="vehicles[{{ $index }}][modified]" value="1"
                @checked(old("vehicles.$index.modified", $vehicle->modified))>
        </div>
        <div class="col-md-4">
            <label class="form-label">Modified Info</label>
            <input type="text" class="form-control" name="vehicles[{{ $index }}][modified_info]"
                value="{{ old("vehicles.$index.modified_info", $vehicle->modified_info) }}">
        </div>

        <div class="col-md-2">
            <label class="form-label">Auction</label><br>
            <input type="hidden" name="vehicles[{{ $index }}][available_at_auction]" value="0">
            @php $vAuction = old("vehicles.$index.available_at_auction", $vehicle->available_at_auction); @endphp
            <input type="checkbox" class="auction-toggle" data-target="#auctionFields-{{ $index }}"
                name="vehicles[{{ $index }}][available_at_auction]" value="1"
                @checked($vAuction)>
        </div>

        <!-- Auction extra fields (hidden by default) -->
        <div class="col-12 auction-fields" id="auctionFields-{{ $index }}"
            @if ($vAuction == 0) style="display: none;" @endif>
            <div class="row g-3 mt-2">
                <div class="col-md-4">
                    <label class="form-label">Auction Link</label>
                    <input type="text" class="form-control" name="vehicles[{{ $index }}][available_link]"
                        value="{{ old("vehicles.$index.available_link", $vehicle->available_link) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Buyer</label>
                    <input type="text" class="form-control" name="vehicles[{{ $index }}][buyer]"
                        value="{{ old("vehicles.$index.buyer", $vehicle->buyer) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Lot/Stock</label>
                    <input type="text" class="form-control" name="vehicles[{{ $index }}][lot]"
                        value="{{ old("vehicles.$index.lot", $vehicle->lot) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Gate PIN</label>
                    <input type="text" class="form-control" name="vehicles[{{ $index }}][gatepin]"
                        value="{{ old("vehicles.$index.gatepin", $vehicle->gatepin) }}">
                </div>
            </div>
        </div>

        <!-- Images -->
        <div class="col-md-12">
            <label class="form-label">Vehicle Images</label>
            <input type="file" name="vehicles[{{ $index }}][images][]" class="form-control image-input"
                multiple accept="image/*">
            
            <div class="mt-3">
                <h6 class="small fw-bold">Existing Images</h6>
                <div class="existing-images-container d-flex flex-wrap gap-2">
                    @foreach ($vehicle->images ?? [] as $img)
                        <div class="position-relative d-inline-block existing-image-wrapper" style="width:100px;height:100px;">
                            <img src="{{ asset($img->image_path) }}" class="img-thumbnail w-100 h-100 object-fit-cover" alt="Vehicle Image">
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-existing-image" 
                                    data-id="{{ $img->id }}" title="Delete image">
                                <i class="bx bx-x"></i>
                            </button>
                            <input type="checkbox" name="vehicles[{{ $index }}][delete_images][]" 
                                   value="{{ $img->id }}" class="d-none delete-image-checkbox"
                                   @checked(is_array(old("vehicles.$index.delete_images")) && in_array($img->id, old("vehicles.$index.delete_images")))>
                        </div>
                    @endforeach
                    @if($vehicle->images->isEmpty())
                        <p class="text-muted small">No existing images.</p>
                    @endif
                </div>
            </div>

            <div class="mt-3">
                <h6 class="small fw-bold">New Images Preview</h6>
                <div class="new-images-preview d-flex flex-wrap gap-2">
                    <!-- New previews will be appended here via JS -->
                </div>
            </div>
        </div>
    </div>

    <div class="text-end mt-3">
        <button type="button" class="btn btn-outline-danger deleteVehicleBtn">Delete Vehicle</button>
    </div>
</div>
