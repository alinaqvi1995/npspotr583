<div class="vehicle-item mb-4 border p-3 rounded" data-index="{{ $index }}">
    <h6 class="mb-3">Vehicle #{{ $index }}</h6>
    <div class="row g-3">
        <input type="hidden" name="vehicles[{{ $index }}][id]" value="{{ $vehicle->id }}">

        <!-- Basic Info -->
        <div class="col-md-3">
            <label class="form-label">Type *</label>
            <select name="vehicles[{{ $index }}][type]" class="form-select vehicle-type-select" required>
                <option value="">Select</option>
                <option @if ($vehicle->type == 'Car') selected @endif>Car</option>
                <option @if ($vehicle->type == 'Motorcycle') selected @endif>Motorcycle</option>
                <option @if ($vehicle->type == 'Golf Cart') selected @endif>Golf Cart</option>
                <option @if ($vehicle->type == 'ATV') selected @endif>ATV</option>
                <option @if ($vehicle->type == 'Heavy Equipment') selected @endif>Heavy Equipment</option>
                <option @if ($vehicle->type == 'RV Transport') selected @endif>RV Transport</option>
                <option @if ($vehicle->type == 'Boat Transport') selected @endif>Boat Transport</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Year</label>
            <select class="form-select year-select" name="vehicles[{{ $index }}][year]"
                data-selected="{{ $vehicle->year }}">
                <option value="">-- Year --</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Make *</label>
            <div class="make-container">
                <select class="form-select make-select" name="vehicles[{{ $index }}][make]"
                    data-selected="{{ $vehicle->make }}"
                    @if ($vehicle->type != 'Car') disabled style="display:none" @endif required>
                    <option value="">-- Select Make --</option>
                    @if ($vehicle->make && !$makes->contains($vehicle->make))
                        <option value="{{ $vehicle->make }}" selected>{{ $vehicle->make }}</option>
                    @endif
                    @foreach ($makes as $make)
                        <option value="{{ $make }}" @selected($vehicle->make == $make)>{{ $make }}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control make-input" name="vehicles[{{ $index }}][make]"
                    value="{{ $vehicle->make }}" placeholder="Enter Make"
                    @if ($vehicle->type == 'Car') disabled style="display:none" @endif required>
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">Model *</label>
            <div class="model-container">
                <select class="form-select model-select" name="vehicles[{{ $index }}][model]"
                    data-selected="{{ $vehicle->model }}"
                    @if ($vehicle->type != 'Car') disabled style="display:none" @endif required>
                    <option value="">-- Select Model --</option>
                    @if ($vehicle->model)
                        <option value="{{ $vehicle->model }}" selected>{{ $vehicle->model }}</option>
                    @endif
                </select>
                <input type="text" class="form-control model-input" name="vehicles[{{ $index }}][model]"
                    value="{{ $vehicle->model }}" placeholder="Enter Model"
                    @if ($vehicle->type == 'Car') disabled style="display:none" @endif required>
            </div>
        </div>

        <!-- CONDITIONAL: Show size fields for boats, heavy equipment, RV -->
        <div class="col-md-2">
            <label class="form-label">Length (ft)</label>
            <input type="number" class="form-control" name="vehicles[{{ $index }}][length_ft]"
                value="{{ $vehicle->length_ft }}">
        </div>
        <div class="col-md-2">
            <label class="form-label">Width (ft)</label>
            <input type="number" class="form-control" name="vehicles[{{ $index }}][width_ft]"
                value="{{ $vehicle->width_ft }}">
        </div>
        <div class="col-md-2">
            <label class="form-label">Height (ft)</label>
            <input type="number" class="form-control" name="vehicles[{{ $index }}][height_ft]"
                value="{{ $vehicle->height_ft }}">
        </div>
        <div class="col-md-2">
            <label class="form-label">Weight (lbs)</label>
            <input type="number" class="form-control" name="vehicles[{{ $index }}][weight]"
                value="{{ $vehicle->weight }}">
        </div>

        <!-- Condition & Trailer -->
        <div class="col-md-3">
            <label class="form-label">Condition</label>
            <select name="vehicles[{{ $index }}][condition]" class="form-select">
                <option value="Running" {{ $vehicle->condition == 'Running' ? 'selected' : '' }}>Running
                </option>
                <option value="Non-Running" {{ $vehicle->condition == 'Non-Running' ? 'selected' : '' }}>
                    Non-Running</option>
            </select>
        </div>

        <!-- Trailer Type only for heavy equipment and RV -->
        <div class="col-md-3">
            <label class="form-label">Trailer Type</label>
            <select name="vehicles[{{ $index }}][trailer_type]" class="form-select">
                <option value="Open Trailer" {{ $vehicle->trailer_type == 'Open Trailer' ? 'selected' : '' }}>
                    Open Trailer
                </option>
                <option value="Enclosed Trailer" {{ $vehicle->trailer_type == 'Enclosed Trailer' ? 'selected' : '' }}>
                    Enclosed Trailer</option>
            </select>
        </div>

        <!-- Booleans -->
        <div class="col-md-2">
            <label class="form-label">Modified</label><br>
            <input type="hidden" name="vehicles[{{ $index }}][modified]" value="0">
            <input type="checkbox" name="vehicles[{{ $index }}][modified]" value="1"
                {{ $vehicle->modified ? 'checked' : '' }}>
        </div>
        <div class="col-md-4">
            <label class="form-label">Modified Info</label>
            <input type="text" class="form-control" name="vehicles[{{ $index }}][modified_info]"
                value="{{ $vehicle->modified_info }}">
        </div>

        <div class="col-md-2">
            <label class="form-label">Auction</label><br>
            <input type="hidden" name="vehicles[{{ $index }}][available_at_auction]" value="0">
            <input type="checkbox" class="auction-toggle" data-target="#auctionFields-{{ $index }}"
                name="vehicles[{{ $index }}][available_at_auction]" value="1"
                {{ $vehicle->available_at_auction ? 'checked' : '' }}>
        </div>

        <!-- Auction extra fields (hidden by default) -->
        <div class="col-12 auction-fields" id="auctionFields-{{ $index }}"
            @if ($vehicle->available_at_auction == 0) style="display: none;" @endif>
            <div class="row g-3 mt-2">
                <div class="col-md-4">
                    <label class="form-label">Auction Link</label>
                    <input type="text" class="form-control" name="vehicles[{{ $index }}][available_link]"
                        value="{{ $vehicle->available_link }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Buyer</label>
                    <input type="text" class="form-control" name="vehicles[{{ $index }}][buyer]"
                        value="{{ $vehicle->buyer }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Lot</label>
                    <input type="text" class="form-control" name="vehicles[{{ $index }}][lot]"
                        value="{{ $vehicle->lot }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Gate PIN</label>
                    <input type="text" class="form-control" name="vehicles[{{ $index }}][gatepin]"
                        value="{{ $vehicle->gatepin }}">
                </div>
            </div>
        </div>

        <!-- Images -->
        <div class="col-md-12">
            <label class="form-label">Images</label>
            <input type="file" name="vehicles[{{ $index }}][images][]" class="form-control image-input"
                multiple>
            <div class="image-preview mt-2 d-flex flex-wrap gap-2">
                @foreach ($vehicle->images ?? [] as $img)
                    <div class="position-relative d-inline-block" style="width:80px;height:80px;">
                        <img src="{{ asset($img->image_path) }}" class="img-thumbnail"
                            style="width:100%;height:100%;object-fit:cover;">
                        <input type="checkbox" name="vehicles[{{ $index }}][delete_images][]"
                            value="{{ $img->id }}" class="position-absolute top-0 end-0">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="text-end mt-3">
        <button type="button" class="btn btn-outline-danger deleteVehicleBtn">Delete
            Vehicle</button>
    </div>
</div>
