<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorizationForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_id',
        'auth_date',
        'purchase_for',
        'company_name',
        'cardholder_name',
        'billing_address',
        'city',
        'state',
        'zip',
        'phone',
        'card_type',
        'card_number',
        'expiry_date',
        'cvv',
        'issuing_bank',
        'bank_number',
        'invoice_amount',
        'signature_image',
        'attachments',
        'ip_address',
    ];

    protected $casts = [
        'attachments' => 'array',
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}
