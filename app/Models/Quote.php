<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
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
        'status'
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
        return $this->pickup_date ? $this->pickup_date->format('M d, Y h:ia') : '-';
    }

    public function getDeliveryDateFormattedAttribute()
    {
        return $this->delivery_date ? $this->delivery_date->format('M d, Y h:ia') : '-';
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at ? $this->created_at->format('M d, Y h:ia') : '-';
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at ? $this->updated_at->format('M d, Y h:ia') : '-';
    }

    // Get status badge HTML dynamically
    public function getStatusLabelAttribute(): string
    {
        $status = $this->status ?? 'New';
        $class = self::$statuses[$status]['class'] ?? 'bg-secondary';
        return "<span class='badge {$class}'>{$status}</span>";
    }

    // Get icon for current status
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
}
