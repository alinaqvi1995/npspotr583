<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\QuoteLocation;
use App\Models\Vehicle;
use App\Traits\LogsActivity;

class Quote extends Model
{
    use LogsActivity;
    protected $fillable = [
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
        'additional_info',
        'status',

        // --new fields-- from create page
        'pickup_address1',
        'pickup_address2',
        'pickup_city',
        'pickup_state',
        'pickup_zip',
        'pickup_buyer_ref',
        'pickup_contact_name',
        'pickup_contact_email',
        'pickup_contact_phone',
        'pickup_twic',
        'pickup_save',

        'delivery_address1',
        'delivery_address2',
        'delivery_city',
        'delivery_state',
        'delivery_zip',
        'delivery_buyer_ref',
        'delivery_contact_name',
        'delivery_contact_email',
        'delivery_contact_phone',
        'delivery_twic',
        'delivery_save',

        'amount_to_pay',
        'cop_cod',
        'cop_cod_amount',
        'balance',
        'balance_amount',

        'load_id',
        'pre_dispatch_notes',
        'transport_special_instructions',
        'load_specific_terms',
    ];

    protected $attributes = [
        'status' => 'New',
    ];

    protected $casts = [
        'pickup_date' => 'datetime',
        'delivery_date' => 'datetime',
    ];

    // Define statuses with icon + badge class
    public static array $statuses = [
        'New' => ['icon' => 'fiber_new', 'class' => 'bg-primary'],
        'In Progress' => ['icon' => 'hourglass_top', 'class' => 'bg-warning'],
        'Completed' => ['icon' => 'check_circle', 'class' => 'bg-success'],
        'Cancelled' => ['icon' => 'cancel', 'class' => 'bg-danger'],
        'Asking Low' => ['icon' => 'trending_down', 'class' => 'bg-info'],
        'Interested' => ['icon' => 'thumb_up', 'class' => 'bg-info'],
        'Follow Up' => ['icon' => 'schedule', 'class' => 'bg-info'],
        'Not Interested' => ['icon' => 'thumb_down', 'class' => 'bg-secondary'],
        'No Response' => ['icon' => 'phone_missed', 'class' => 'bg-secondary'],
        'Booked' => ['icon' => 'event_available', 'class' => 'bg-success'],
        'Payment Missing' => ['icon' => 'payment', 'class' => 'bg-warning'],
        'Listed' => ['icon' => 'list', 'class' => 'bg-info'],
        'Dispatch' => ['icon' => 'local_shipping', 'class' => 'bg-info'],
        'Pickup' => ['icon' => 'shopping_bag', 'class' => 'bg-info'],
        'Delivery' => ['icon' => 'done_all', 'class' => 'bg-success'],
        'Deleted' => ['icon' => 'delete', 'class' => 'bg-danger'],
    ];

    public function allowedStatuses(string $currentStatus): array
    {
        $transitions = [
            'New' => ['Listed', 'Payment Missing', 'In Progress', 'Cancelled'],
            'Listed' => ['Booked', 'Payment Missing', 'Cancelled'],
            'Payment Missing' => ['Booked', 'Cancelled'],
            'Booked' => ['Dispatch', 'Pickup', 'Delivery', 'Completed', 'Cancelled'],
            'Dispatch' => ['Pickup', 'Delivery', 'Completed', 'Cancelled'],
            'Pickup' => ['Delivery', 'Completed', 'Cancelled'],
            'Delivery' => ['Completed', 'Cancelled'],
            'In Progress' => ['Completed', 'Cancelled'],
            'Asking Low' => ['Interested', 'Follow Up', 'Not Interested', 'No Response'],
            'Interested' => ['Follow Up', 'Not Interested', 'Booked'],
            'Follow Up' => ['Interested', 'Not Interested', 'No Response'],
            'Not Interested' => [],
            'No Response' => ['Follow Up', 'Interested'],
            'Completed' => [],
            'Cancelled' => [],
            'Deleted' => [],
        ];

        $allowed = $transitions[$currentStatus] ?? [];

        // Always include current status so user sees it
        if (!in_array($currentStatus, $allowed)) {
            array_unshift($allowed, $currentStatus);
        }

        // Return with details (icons and class) from self::$statuses
        return array_intersect_key(self::$statuses, array_flip($allowed));
    }

    protected static function booted()
    {
        // Log Quote creation
        static::created(function ($quote) {
            $quote->histories()->create([
                'status' => $quote->status,
                'old_status' => null,
                'changed_by' => Auth::id(),
                'change_type' => 'create',
                'data' => $quote->toJson(),
            ]);
        });

        static::updated(function ($quote) {
            $changes = $quote->getChanges();
            unset($changes['updated_at']);
            if (count($changes) === 0) return;

            $quote->histories()->create([
                'status' => $quote->status,
                'old_status' => $quote->getOriginal('status'),
                'changed_by' => Auth::id(),
                'change_type' => 'update',
                'data' => json_encode($changes),
            ]);
        });
    }

    public function createHistory(string $changeType)
    {
        $this->histories()->create([
            'status' => $this->status,
            'old_status' => $this->getOriginal('status'),
            'changed_by' => Auth::id(),
            'change_type' => $changeType,
            'data' => $this->toJson(),
        ]);
    }

    public function histories()
    {
        return $this->hasMany(QuoteHistory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function getPickupDateFormattedAttribute()
    {
        return $this->pickup_date ? $this->pickup_date->format('Md, Y h:ia') : '-';
    }

    public function getDeliveryDateFormattedAttribute()
    {
        return $this->delivery_date ? $this->delivery_date->format('Md, Y h:ia') : '-';
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at ? $this->created_at->format('Md, Y h:ia') : '-';
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at ? $this->updated_at->format('Md, Y h:ia') : '-';
    }

    public function getStatusLabelAttribute(): string
    {
        $status = $this->status ?? 'New';
        $class = self::$statuses[$status]['class'] ?? 'bg-secondary';
        return "<span class='badge {$class}'>{$status}</span>";
    }

    public function getStatusIconAttribute(): string
    {
        $status = $this->status ?? 'New';
        return self::$statuses[$status]['icon'] ?? 'help_outline';
    }

    public function categoryName()
    {
        return $this->category ? $this->category->name : 'N/A';
    }

    public function subcategoryName()
    {
        return $this->subcategory ? $this->subcategory->name : 'N/A';
    }

    public function phones()
    {
        return $this->hasMany(QuotePhone::class);
    }

    public function pickupPhones()
    {
        return $this->pickupLocation ? $this->pickupLocation->phones() : $this->hasMany(QuotePhone::class)->whereRaw('0=1');
    }

    public function deliveryPhones()
    {
        return $this->deliveryLocation ? $this->deliveryLocation->phones() : $this->hasMany(QuotePhone::class)->whereRaw('0=1');
    }

    public function locations()
    {
        return $this->hasMany(QuoteLocation::class);
    }
    public function pickupLocation()
    {
        return $this->hasOne(QuoteLocation::class)->where('type', 'pickup');
    }

    public function deliveryLocation()
    {
        return $this->hasOne(QuoteLocation::class)->where('type', 'delivery');
    }
}

// 2️⃣ Full History Report

// If you want all status changes, use the quote_histories table:

// $histories = \DB::table('quote_histories')
//     ->join('quotes', 'quotes.id', '=', 'quote_histories.quote_id')
//     ->select(
//         'quotes.id as quote_id',
//         'quotes.customer_name',
//         'quote_histories.status',
//         'quote_histories.old_status',
//         'quote_histories.changed_by',
//         'quote_histories.change_type',
//         'quote_histories.created_at'
//     )
//     ->orderBy('quote_histories.created_at', 'asc')
//     ->get();


// 3️⃣ Latest Status Only Using Histories

// If you want the last status per quote from histories, you can use a subquery:

// $latestHistories = \DB::table('quote_histories as h1')
//     ->select('h1.*')
//     ->whereRaw('h1.id = (
//         select max(h2.id) from quote_histories h2
//         where h2.quote_id = h1.quote_id
//     )')
//     ->get();


//     4️⃣ Grouping by Status (Report Example)

// You can also count how many times quotes were in each status:

// $statusCounts = \DB::table('quote_histories')
//     ->select('status', \DB::raw('count(*) as total'))
//     ->groupBy('status')
//     ->orderBy('total', 'desc')
//     ->get();