<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Traits\LogsActivity;

class OrderForm extends Model
{
    use LogsActivity;

    protected $table = 'order_forms';

    protected $fillable = [
        'quote_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'pickup_address1',
        'pickup_contact_name',
        'pickup_contact_email',
        'pickup_date',
        'delivery_address1',
        'delivery_contact_name',
        'delivery_contact_email',
        'delivery_date',
        'special_instructions',
        'payment_option',
        'signature_name',
        'signature_date',
    ];

    protected $casts = [
        'pickup_date'   => 'datetime',
        'delivery_date' => 'datetime',
        'signature_date' => 'date',
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    protected static function booted()
    {
        static::creating(function ($orderForm) {
            if (Auth::check()) {
                $orderForm->created_by = Auth::id();
                $orderForm->modified_by = Auth::id();
            } else {
                $orderForm->created_by = null;
            }
        });

        static::updating(function ($orderForm) {
            if (Auth::check()) {
                $orderForm->modified_by = Auth::id();
            } else {
                $orderForm->created_by = null;
            }
        });
    }
}
