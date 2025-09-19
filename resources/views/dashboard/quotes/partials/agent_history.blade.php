@if($histories->isEmpty())
    <p class="text-muted">No history found for this quote.</p>
@else
    <div class="list-group">
        @foreach($histories as $history)
            <div class="list-group-item">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>{{ $history->title }}</strong><br>
                        <small class="text-muted">
                            {{ $history->description }}
                        </small>
                    </div>
                    <div class="text-end">
                        <small>
                            By: {{ $history->user->name ?? 'System' }}<br>
                            On: {{ $history->created_at->format('d M Y h:i A') }}
                        </small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
