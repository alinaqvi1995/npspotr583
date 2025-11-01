@extends('dashboard.includes.partial.base')

@section('title', 'Quote Details')

@section('content')
    <h6 class="mb-0 text-uppercase">
        Quote Details</h6>
    <hr>

    {{-- ===========================
         CUSTOMER + QUOTE INFO
    ============================ --}}
    <div class="row">
        {{-- Customer Info --}}
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header bg-primary text-white"><strong>Customer</strong></div>
                <div class="card-body">
                    @foreach (['customer_name' => 'Name', 'customer_email' => 'Email', 'customer_phone' => 'Phone'] as $field => $label)
                        @if ($quote->$field)
                            <p><strong>{{ $label }}:</strong> {{ $quote->$field }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Quote Info --}}
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header bg-secondary text-white"><strong>Quote Info</strong></div>
                <div class="card-body row">
                    <div class="col-sm-6">
                        @if ($quote->categoryName())
                            <p><strong>Category:</strong> {{ $quote->categoryName() }}</p>
                        @endif
                        @if ($quote->subcategoryName())
                            <p><strong>Subcategory:</strong> {{ $quote->subcategoryName() }}</p>
                        @endif
                        @if ($quote->vehicle_type)
                            <p><strong>Vehicle Type:</strong> {{ $quote->vehicle_type }}</p>
                        @endif
                        @if ($quote->status_label)
                            <p><strong>Status:</strong> {!! $quote->status_label !!}</p>
                        @endif
                        @if ($quote->user)
                            <p><strong>Created By:</strong> {{ $quote->user->name }}</p>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        @if ($quote->pickup_location)
                            <p><strong>Pickup:</strong> {{ $quote->pickup_location }}</p>
                        @endif
                        @if ($quote->pickup_date_formatted)
                            <p><strong>Pickup Date:</strong> {{ $quote->pickup_date_formatted }}</p>
                        @endif
                        @if ($quote->delivery_location)
                            <p><strong>Delivery:</strong> {{ $quote->delivery_location }}</p>
                        @endif
                        @if ($quote->delivery_date_formatted)
                            <p><strong>Delivery Date:</strong> {{ $quote->delivery_date_formatted }}</p>
                        @endif
                        <p><strong>Created At:</strong> {{ $quote->created_at_formatted }}</p>
                        <p><strong>Updated At:</strong> {{ $quote->updated_at_formatted }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===========================
         PRICING
    ============================ --}}
    @if ($quote->amount_to_pay || $quote->cop_cod || $quote->balance)
        <div class="card mb-3">
            <div class="card-header bg-info text-white"><strong>Pricing</strong></div>
            <div class="card-body">
                @if ($quote->amount_to_pay)
                    <p><strong>Amount to Pay:</strong> ${{ number_format($quote->amount_to_pay, 2) }}</p>
                @endif
                @if ($quote->cop_cod)
                    <p><strong>COD:</strong> {{ $quote->cop_cod }}</p>
                @endif
                @if ($quote->cop_cod_amount)
                    <p><strong>COD Amount:</strong> ${{ number_format($quote->cop_cod_amount, 2) }}</p>
                @endif
                @if ($quote->balance)
                    <p><strong>Balance:</strong> {{ $quote->balance }}</p>
                @endif
                @if ($quote->balance_amount)
                    <p><strong>Balance Amount:</strong> ${{ number_format($quote->balance_amount, 2) }}</p>
                @endif
                @if ($quote->discounted_price)
                    <p><strong>Discounted Price:</strong> ${{ number_format($quote->discounted_price, 2) }}</p>
                @endif
            </div>
        </div>
    @endif

    {{-- ===========================
         PICKUP + DELIVERY
    ============================ --}}
    <div class="row mb-3">
        {{-- Pickup --}}
        @if ($quote->pickupLocation)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white"><strong>Pickup Details</strong></div>
                    <div class="card-body">
                        @php $pickup = $quote->pickupLocation; @endphp

                        @if ($pickup->address1 || $pickup->address2)
                            <p><strong>Address:</strong> {{ $pickup->address1 }} {{ $pickup->address2 }}</p>
                        @endif

                        @if ($pickup->city || $pickup->state)
                            <p><strong>City/State/Zip:</strong> {{ $pickup->city }}, {{ $pickup->state }}
                                {{ $pickup->zip }}</p>
                        @endif

                        @if ($pickup->contact_name)
                            <p><strong>Contact:</strong> {{ $pickup->contact_name }}</p>
                        @endif

                        @if ($pickup->contact_email)
                            <p><strong>Email:</strong> {{ $pickup->contact_email }}</p>
                        @endif

                        @if ($quote->pickupPhones && $quote->pickupPhones->count())
                            <p><strong>Phone(s):</strong></p>
                            <ul class="mb-0">
                                @foreach ($quote->pickupPhones as $phone)
                                    <li>{{ $phone->phone }} @if ($phone->type)
                                            <small>({{ ucfirst($phone->type) }})</small>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if (!is_null($pickup->twic))
                            <p><strong>TWIC:</strong> {{ $pickup->twic ? 'Yes' : 'No' }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        {{-- Delivery --}}
        @if ($quote->deliveryLocation)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning text-white"><strong>Delivery Details</strong></div>
                    <div class="card-body">
                        @php $delivery = $quote->deliveryLocation; @endphp

                        @if ($delivery->address1 || $delivery->address2)
                            <p><strong>Address:</strong> {{ $delivery->address1 }} {{ $delivery->address2 }}</p>
                        @endif

                        @if ($delivery->city || $delivery->state)
                            <p><strong>City/State/Zip:</strong> {{ $delivery->city }}, {{ $delivery->state }}
                                {{ $delivery->zip }}</p>
                        @endif

                        @if ($delivery->contact_name)
                            <p><strong>Contact:</strong> {{ $delivery->contact_name }}</p>
                        @endif

                        @if ($delivery->contact_email)
                            <p><strong>Email:</strong> {{ $delivery->contact_email }}</p>
                        @endif

                        @if ($quote->deliveryPhones && $quote->deliveryPhones->count())
                            <p><strong>Phone(s):</strong></p>
                            <ul class="mb-0">
                                @foreach ($quote->deliveryPhones as $phone)
                                    <li>{{ $phone->phone }} @if ($phone->type)
                                            <small>({{ ucfirst($phone->type) }})</small>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if (!is_null($delivery->twic))
                            <p><strong>TWIC:</strong> {{ $delivery->twic ? 'Yes' : 'No' }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- ===========================
         ADDITIONAL INFO
    ============================ --}}
    @if ($quote->load_id || $quote->pre_dispatch_notes || $quote->load_specific_terms)
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white"><strong>Additional Info</strong></div>
            <div class="card-body">
                @if ($quote->load_id)
                    <p><strong>Load ID:</strong> {{ $quote->load_id }}</p>
                @endif
                @if ($quote->pre_dispatch_notes)
                    <p><strong>Pre-Dispatch Notes:</strong> {{ $quote->pre_dispatch_notes }}</p>
                @endif
                @if ($quote->transport_special_instructions)
                    <p><strong>Special Instructions:</strong> {{ $quote->transport_special_instructions }}</p>
                @endif
                @if ($quote->load_specific_terms)
                    <p><strong>Load Terms:</strong> {{ $quote->load_specific_terms }}</p>
                @endif
            </div>
        </div>
    @endif

    {{-- ===========================
         VEHICLES
    ============================ --}}
    @if ($quote->vehicles->count())
        <div class="card mb-3">
            <div class="card-header bg-dark text-white"><strong>Vehicles ({{ $quote->vehicles->count() }})</strong></div>
            <div class="card-body">
                <div class="accordion" id="vehicleAccordion">
                    @foreach ($quote->vehicles as $i => $v)
                        <div class="accordion-item mb-2">
                            <h2 class="accordion-header" id="head{{ $i }}">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $i }}" aria-expanded="false"
                                    aria-controls="collapse{{ $i }}">
                                    {{ $v->year }} {{ $v->make }} {{ $v->model }}
                                </button>
                            </h2>
                            <div id="collapse{{ $i }}" class="accordion-collapse collapse"
                                aria-labelledby="head{{ $i }}" data-bs-parent="#vehicleAccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Type:</strong> {{ $v->type ?? '—' }}</div>
                                        <div class="col-md-3"><strong>Condition:</strong> {!! $v->condition_label !!}</div>
                                        <div class="col-md-3"><strong>Trailer Type:</strong> {!! $v->trailer_type_label !!}</div>
                                        <div class="col-md-3"><strong>Modified:</strong> {{ $v->modified ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                    @if ($v->modified_info)
                                        <p><strong>Modified Info:</strong> {{ $v->modified_info }}</p>
                                    @endif

                                    {{-- Dimensions for specific transport types --}}
                                    @if (in_array($v->type, ['Boat-Transport', 'Heavy-Equipment', 'RV-Transport']))
                                        <hr>
                                        <div class="row">
                                            @foreach (['length_ft' => 'Length (ft)', 'width_ft' => 'Width (ft)', 'height_ft' => 'Height (ft)', 'weight' => 'Weight (lbs)'] as $field => $label)
                                                @if ($v->$field)
                                                    <div class="col-md-3"><strong>{{ $label }}:</strong>
                                                        {{ $v->$field }}</div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif

                                    {{-- Auction details --}}
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3"><strong>At Auction:</strong>
                                            {{ $v->available_at_auction ? 'Yes' : 'No' }}</div>
                                        @if ($v->available_at_auction)
                                            @if ($v->available_link)
                                                <div class="col-md-4"><strong>Auction Link:</strong> <a
                                                        href="{{ $v->available_link }}"
                                                        target="_blank">{{ $v->available_link }}</a></div>
                                            @endif
                                            @if ($v->buyer)
                                                <div class="col-md-2"><strong>Buyer:</strong> {{ $v->buyer }}</div>
                                            @endif
                                            @if ($v->lot)
                                                <div class="col-md-2"><strong>Lot:</strong> {{ $v->lot }}</div>
                                            @endif
                                            @if ($v->gatepin)
                                                <div class="col-md-2"><strong>Gate PIN:</strong> {{ $v->gatepin }}</div>
                                            @endif
                                        @endif
                                    </div>

                                    {{-- Vehicle Images --}}
                                    @if ($v->images->count())
                                        <hr>
                                        <div class="d-flex flex-wrap">
                                            @foreach ($v->images as $img)
                                                <img src="{{ asset($img->image_path) }}" class="rounded border me-2 mb-2"
                                                    width="100" height="100" style="object-fit:cover;">
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- ===========================
         ORDER FORM (if exists)
    ============================ --}}
    @if ($quote->OrderForm)
        <div class="card mb-3">
            <div class="card-header bg-primary text-white"><strong>Order Form</strong></div>
            <div class="card-body row">
                <div class="col-md-6">
                    <p><strong>Customer Name:</strong> {{ $quote->OrderForm->customer_name }}</p>
                    <p><strong>Email:</strong> {{ $quote->OrderForm->customer_email }}</p>
                    <p><strong>Phone:</strong> {{ $quote->OrderForm->customer_phone }}</p>
                    <p><strong>Pickup Date:</strong> {{ $quote->OrderForm->pickup_date_formatted }}</p>
                    <p><strong>Delivery Date:</strong> {{ $quote->OrderForm->delivery_date_formatted }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Pickup Address:</strong> {{ $quote->OrderForm->pickup_address1 }}</p>
                    <p><strong>Delivery Address:</strong> {{ $quote->OrderForm->delivery_address1 }}</p>
                    @if ($quote->OrderForm->special_instructions)
                        <p><strong>Special Instructions:</strong> {{ $quote->OrderForm->special_instructions }}</p>
                    @endif
                    @if ($quote->OrderForm->payment_option)
                        <p><strong>Payment Option:</strong> {{ ucfirst($quote->OrderForm->payment_option) }}</p>
                    @endif
                    @if ($quote->OrderForm->signature_name)
                        <p><strong>Signed By:</strong> {{ $quote->OrderForm->signature_name }}</p>
                        <p><strong>Signature Date:</strong> {{ $quote->OrderForm->signature_date?->format('M d, Y') }}</p>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <div class="text-end mt-4">
        <a href="{{ route('dashboard.quotes.index', ['status' => 'New']) }}" class="btn btn-secondary">← Back to Quotes</a>
    </div>
@endsection


{{-- @extends('dashboard.includes.partial.base')

@section('title', 'Quote Details')

@section('content')
    <h6 class="mb-0 text-uppercase">Quote Details</h6>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header bg-primary text-white"><strong>Customer</strong></div>
                <div class="card-body">
                    @if ($quote->customer_name)
                        <p><strong>Name:</strong> {{ $quote->customer_name }}</p>
                    @endif
                    @if ($quote->customer_email)
                        <p><strong>Email:</strong> {{ $quote->customer_email }}</p>
                    @endif
                    @if ($quote->customer_phone)
                        <p><strong>Phone:</strong> {{ $quote->customer_phone }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header bg-secondary text-white"><strong>Quote Info</strong></div>
                <div class="card-body row">
                    <div class="col-sm-6">
                        @if ($quote->categoryName())
                            <p><strong>Category:</strong> {{ $quote->categoryName() }}</p>
                        @endif
                        @if ($quote->subcategoryName())
                            <p><strong>Subcategory:</strong> {{ $quote->subcategoryName() }}</p>
                        @endif
                        @if ($quote->vehicle_type)
                            <p><strong>Vehicle Type:</strong> {{ $quote->vehicle_type }}</p>
                        @endif
                        @if ($quote->status_label)
                            <p><strong>Status:</strong> {!! $quote->status_label !!}</p>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        @if ($quote->pickup_location)
                            <p><strong>Pickup Location:</strong> {{ $quote->pickup_location }}</p>
                        @endif
                        @if ($quote->pickup_date_formatted)
                            <p><strong>Pickup Date:</strong> {{ $quote->pickup_date_formatted }}</p>
                        @endif
                        @if ($quote->delivery_location)
                            <p><strong>Delivery Location:</strong> {{ $quote->delivery_location }}</p>
                        @endif
                        @if ($quote->delivery_date_formatted)
                            <p><strong>Delivery Date:</strong> {{ $quote->delivery_date_formatted }}</p>
                        @endif
                        @if ($quote->created_at_formatted)
                            <p><strong>Created At:</strong> {{ $quote->created_at_formatted }}</p>
                        @endif
                        @if ($quote->updated_at_formatted)
                            <p><strong>Updated At:</strong> {{ $quote->updated_at_formatted }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-info text-white"><strong>Pricing</strong></div>
        <div class="card-body">
            @if ($quote->amount_to_pay)
                <p><strong>Amount to Pay:</strong> ${{ number_format($quote->amount_to_pay, 2) }}</p>
            @endif
            @if ($quote->cop_cod)
                <p><strong>COD:</strong> {{ $quote->cop_cod }}</p>
            @endif
            @if ($quote->cop_cod_amount)
                <p><strong>COD Amount:</strong> ${{ number_format($quote->cop_cod_amount, 2) }}</p>
            @endif
            @if ($quote->balance)
                <p><strong>Balance:</strong> ${{ number_format($quote->balance, 2) }}</p>
            @endif
            @if ($quote->balance_amount)
                <p><strong>Balance Amount:</strong> ${{ number_format($quote->balance_amount, 2) }}</p>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white"><strong>Pickup Details</strong></div>
                <div class="card-body">
                    @if ($quote->pickup_address1 || $quote->pickup_address2)
                        <p><strong>Address:</strong> {{ $quote->pickup_address1 }} {{ $quote->pickup_address2 }}</p>
                    @endif
                    @if ($quote->pickup_city || $quote->pickup_state || $quote->pickup_zip)
                        <p><strong>City/State/Zip:</strong> {{ $quote->pickup_city }}, {{ $quote->pickup_state }}
                            {{ $quote->pickup_zip }}</p>
                    @endif
                    @if ($quote->pickup_contact_name)
                        <p><strong>Contact Name:</strong> {{ $quote->pickup_contact_name }}</p>
                    @endif
                    @if ($quote->pickup_contact_email)
                        <p><strong>Contact Email:</strong> {{ $quote->pickup_contact_email }}</p>
                    @endif
                    @if ($quote->pickup_contact_phone)
                        <p><strong>Phone(s):</strong> {{ $quote->pickup_contact_phone }}</p>
                    @endif
                    @if (!is_null($quote->pickup_twic))
                        <p><strong>TWIC:</strong> {{ $quote->pickup_twic ? 'Yes' : 'No' }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-white"><strong>Delivery Details</strong></div>
                <div class="card-body">
                    @if ($quote->delivery_address1 || $quote->delivery_address2)
                        <p><strong>Address:</strong> {{ $quote->delivery_address1 }} {{ $quote->delivery_address2 }}</p>
                    @endif
                    @if ($quote->delivery_city || $quote->delivery_state || $quote->delivery_zip)
                        <p><strong>City/State/Zip:</strong> {{ $quote->delivery_city }}, {{ $quote->delivery_state }}
                            {{ $quote->delivery_zip }}</p>
                    @endif
                    @if ($quote->delivery_contact_name)
                        <p><strong>Contact Name:</strong> {{ $quote->delivery_contact_name }}</p>
                    @endif
                    @if ($quote->delivery_contact_email)
                        <p><strong>Contact Email:</strong> {{ $quote->delivery_contact_email }}</p>
                    @endif
                    @if ($quote->delivery_contact_phone)
                        <p><strong>Phone(s):</strong> {{ $quote->delivery_contact_phone }}</p>
                    @endif
                    @if (!is_null($quote->delivery_twic))
                        <p><strong>TWIC:</strong> {{ $quote->delivery_twic ? 'Yes' : 'No' }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-secondary text-white"><strong>Additional Info</strong></div>
        <div class="card-body">
            @if ($quote->load_id)
                <p><strong>Load ID:</strong> {{ $quote->load_id }}</p>
            @endif
            @if ($quote->pre_dispatch_notes)
                <p><strong>Pre-dispatch Notes:</strong> {{ $quote->pre_dispatch_notes }}</p>
            @endif
            @if ($quote->transport_special_instructions)
                <p><strong>Transport Instructions:</strong> {{ $quote->transport_special_instructions }}</p>
            @endif
            @if ($quote->load_specific_terms)
                <p><strong>Load Terms:</strong> {{ $quote->load_specific_terms }}</p>
            @endif
        </div>
    </div>

    @if ($quote->vehicles->count())
        <div class="card mb-3">
            <div class="card-header bg-dark text-white"><strong>Vehicles ({{ $quote->vehicles->count() }})</strong></div>
            <div class="card-body">
                <div class="accordion" id="vehicleAccordion">
                    @foreach ($quote->vehicles as $index => $vehicle)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}" aria-expanded="false"
                                    aria-controls="collapse{{ $index }}">
                                    {{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $index }}" data-bs-parent="#vehicleAccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p><strong>Type:</strong> {{ $vehicle->type ?? '—' }}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p><strong>Year:</strong> {{ $vehicle->year ?? '—' }}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p><strong>Make:</strong> {{ $vehicle->make ?? '—' }}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p><strong>Model:</strong> {{ $vehicle->model ?? '—' }}</p>
                                        </div>
                                    </div>

                                    @if (in_array($vehicle->type, ['Boat-Transport', 'Heavy-Equipment', 'RV-Transport']))
                                        <div class="row mt-2">
                                            @if ($vehicle->length_ft)
                                                <div class="col-md-2">
                                                    <p><strong>Length (ft):</strong> {{ $vehicle->length_ft }}</p>
                                                </div>
                                            @endif
                                            @if ($vehicle->width_ft)
                                                <div class="col-md-2">
                                                    <p><strong>Width (ft):</strong> {{ $vehicle->width_ft }}</p>
                                                </div>
                                            @endif
                                            @if ($vehicle->height_ft)
                                                <div class="col-md-2">
                                                    <p><strong>Height (ft):</strong> {{ $vehicle->height_ft }}</p>
                                                </div>
                                            @endif
                                            @if ($vehicle->weight)
                                                <div class="col-md-2">
                                                    <p><strong>Weight (lbs):</strong> {{ $vehicle->weight }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    @endif

                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <p><strong>Condition:</strong> {!! $vehicle->condition_label !!}</p>
                                        </div>

                                        <div class="col-md-3">
                                            <p><strong>Trailer Type:</strong> {!! $vehicle->trailer_type_label !!}</p>
                                        </div>

                                        <div class="col-md-2">
                                            <p><strong>Modified:</strong> {{ $vehicle->modified ? 'Yes' : 'No' }}</p>
                                        </div>

                                        @if ($vehicle->modified_info)
                                            <div class="col-md-4">
                                                <p><strong>Modified Info:</strong> {{ $vehicle->modified_info }}</p>
                                            </div>
                                        @endif
                                    </div>

                                    @if ($vehicle->available_at_auction)
                                        <div class="row mt-3 border-top pt-2">
                                            <div class="col-md-3">
                                                <p><strong>Auction:</strong> Yes</p>
                                            </div>
                                            @if ($vehicle->available_link)
                                                <div class="col-md-3">
                                                    <p><strong>Auction Link:</strong>
                                                        <a href="{{ $vehicle->available_link }}"
                                                            target="_blank">{{ $vehicle->available_link }}</a>
                                                    </p>
                                                </div>
                                            @endif
                                            @if ($vehicle->buyer)
                                                <div class="col-md-3">
                                                    <p><strong>Buyer:</strong> {{ $vehicle->buyer }}</p>
                                                </div>
                                            @endif
                                            @if ($vehicle->lot)
                                                <div class="col-md-3">
                                                    <p><strong>Lot:</strong> {{ $vehicle->lot }}</p>
                                                </div>
                                            @endif
                                            @if ($vehicle->gatepin)
                                                <div class="col-md-3">
                                                    <p><strong>Gate PIN:</strong> {{ $vehicle->gatepin }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <p><strong>Auction:</strong> No</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($vehicle->images->count())
                                        <div class="d-flex flex-wrap mt-3">
                                            @foreach ($vehicle->images as $img)
                                                <div class="position-relative me-2 mb-2">
                                                    <img src="{{ asset($img->image_path) }}" class="rounded border"
                                                        width="80" height="80" style="object-fit:cover;">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <a href="{{ route('dashboard.quotes.index', ['status' => 'New']) }}" class="btn btn-secondary">Back to Quotes</a>
@endsection --}}
