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
}
