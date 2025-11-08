<div class="table-responsive">
    <table class="table table-bordered table-striped align-middle" id="quoteTable">
        <thead>
            <tr>
                <th>Sr#.</th>
                <th>Quote#.</th>
                <th>Customer</th>
                <th>Vehicles</th>
                <th>Pickup / Delivery</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($histories as $history)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{ $history->quote->id }}<br>
                    </td>
                    <td>
                        @if ($history->quote->customer_name == optional($history->quote->pickupLocation)->contact_name)
                            {{-- Case: Normal == Pickup → show Delivery --}}
                            {{ optional($history->quote->deliveryLocation)->contact_name }}<br>
                            <small>{{ optional($history->quote->deliveryLocation)->contact_email }}</small><br>
                            <small>{{ optional($history->quote->deliveryPhones->first())->phone }}</small>
                        @elseif ($history->quote->customer_name || $history->quote->customer_email || $history->quote->customer_phone)
                            {{-- Case: Normal (customer) exists → show Customer --}}
                            {{ $history->quote->customer_name ?? optional($history->quote->deliveryLocation)->contact_name }}<br>
                            <small>{{ $history->quote->customer_email ?? optional($history->quote->deliveryLocation)->contact_email }}</small><br>
                            <small>{{ $history->quote->customer_phone ?? optional($history->quote->deliveryPhones->first())->phone }}</small>
                        @else
                            {{-- Fallback → Delivery --}}
                            {{ optional($history->quote->deliveryLocation)->contact_name }}<br>
                            <small>{{ optional($history->quote->deliveryLocation)->contact_email }}</small><br>
                            <small>{{ optional($history->quote->deliveryPhones->first())->phone }}</small>
                        @endif
                    </td>

                    <td>
                        @foreach ($history->quote->vehicles as $vehicle)
                            <div class="mb-2 border-bottom pb-2">
                                {{-- Prominent YMM --}}
                                <p class="mb-1 fw-bold fs-6">
                                    {{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}
                                </p>

                                {{-- Smaller condition --}}
                                @if ($vehicle->condition)
                                    <div class="small text-muted">
                                        Condition: {!! $vehicle->condition_label !!}
                                    </div>
                                @endif

                                {{-- Smaller trailer type --}}
                                @if ($vehicle->trailer_type)
                                    <div class="small text-muted">
                                        Trailer: {!! $vehicle->trailer_type_label !!}
                                    </div>
                                @endif

                                {{-- Vehicle images --}}
                                @if ($vehicle->images->count())
                                    <div class="d-flex flex-wrap justify-content-center mt-1">
                                        @foreach ($vehicle->images as $img)
                                            <img src="{{ asset($img->image_path) }}"
                                                alt="{{ $vehicle->make }} {{ $vehicle->model }}" width="50"
                                                height="50" class="rounded-circle me-1 mb-1 border">
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </td>
                    <td>
                        <strong>Pickup:</strong><br>
                        <a href="https://www.google.com/maps/search/{{ urlencode($history->quote->pickupLocation->full_location) }}"
                            target="_blank">{{ $history->quote->pickupLocation->full_location }}</a><br>
                        <span>{{ $history->quote->pickup_date_formatted }}</span><br>
                        <strong>Delivery:</strong><br>
                        <a href="https://www.google.com/maps/search/{{ urlencode($history->quote->deliveryLocation->full_location) }}"
                            target="_blank">{{ $history->quote->deliveryLocation->full_location }}</a><br>
                        <span>{{ $history->quote->delivery_date_formatted }}</span>
                    </td>
                    {{-- <td>{!! $history->quote->status_label !!}</td> --}}
                    <td>{{ $history->quote->created_at_formatted }}</td>
                    <td>
                        {!! $history->quote->status_label !!}
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light border dropdown-toggle" type="button"
                                data-bs-toggle="dropdown">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                @can('edit-quotes')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('dashboard.quotes.edit', $history->quote->id) }}">
                                            <i class="material-icons-outlined fs-6 me-1">edit</i> Edit Quote
                                        </a>
                                    </li>
                                @endcan
                                <li>
                                    @if ($history->quote->orderForm()->exists())
                                        <a class="dropdown-item view-order-form"
                                            href="{{ route('dashboard.orderForms.show', $history->quote->orderForm->id) }}"
                                            target="_blank" data-id="{{ $history->quote->id }}">
                                            <i class="material-icons-outlined fs-6 me-1">send</i> View Order
                                            Form
                                        </a>
                                    @else
                                        <a class="dropdown-item send-order-form" href="javascript:;"
                                            data-id="{{ $history->quote->id }}" data-price="{{ $history->quote->amount_to_pay }}">
                                            <i class="material-icons-outlined fs-6 me-1">send</i> Send Order
                                            Form
                                        </a>
                                    @endif
                                </li>
                                <li>
                                    <a class="dropdown-item view-logs" href="javascript:;"
                                        data-id="{{ $history->quote->id }}">
                                        <i class="material-icons-outlined fs-6 me-1">receipt_long</i> View Logs
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item agent-history" href="javascript:;"
                                        data-id="{{ $history->quote->id }}">
                                        <i class="material-icons-outlined fs-6 me-1">history</i> Agent History
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item change-status" href="javascript:;"
                                        data-id="{{ $history->quote->id }}" data-status="{{ $history->quote->status }}">
                                        <i class="material-icons-outlined fs-6 me-1">swap_horiz</i> Change
                                        Status
                                    </a>
                                </li>
                                @if ($history->quote->listed_price && in_array($history->quote->status, ['Listed', 'Completed']))
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('dashboard.quotes.details', $history->quote->id) }}">
                                            <i class="material-icons-outlined fs-6 me-1">edit</i> View Order
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item payment" href="javascript:;"
                                            data-id="{{ $history->quote->id }}" data-order-id="{{ $history->quote->id }}"
                                            data-vehicles="{{ $history->quote->vehicles->map(fn($v) => $v->year . ' ' . $v->make . ' ' . $v->model)->implode(' | ') }}"
                                            data-pickup-zip="{{ $history->quote->pickupLocation->full_location }}"
                                            data-delivery-zip="{{ $history->quote->deliveryLocation->full_location }}"
                                            data-book-price="{{ $history->quote->amount_to_pay }}"
                                            data-listed-price="{{ $history->quote->listed_price }}"
                                            data-profit="{{ $history->quote->amount_to_pay - $history->quote->listed_price }}"
                                            data-status="{{ $history->quote->status }}">
                                            <i class="material-icons-outlined fs-6 me-1">wallet</i> Payment
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-center mt-3">
    {!! $histories->links('pagination::bootstrap-5') !!}
</div>
