<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
        return $this->pickup_date ? $this->pickup_date->format('Y-m-d') : '-';
    }

    public function getDeliveryDateFormattedAttribute()
    {
        return $this->delivery_date ? $this->delivery_date->format('Y-m-d') : '-';
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at ? $this->created_at->format('Y-m-d H:i:s') : '-';
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at ? $this->updated_at->format('Y-m-d H:i:s') : '-';
    }

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 'New':
                return '<span class="badge bg-primary">New</span>';
            case 'In Progress':
                return '<span class="badge bg-warning">In Progress</span>';
            case 'Completed':
                return '<span class="badge bg-success">Completed</span>';
            case 'Cancelled':
                return '<span class="badge bg-danger">Cancelled</span>';
            default:
                return '<span class="badge bg-secondary">Unknown</span>';
        }
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
