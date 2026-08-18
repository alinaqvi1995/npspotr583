<?php

namespace App\Models;

use App\Casts\SafeEncrypted;
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
        'card_last_four',
        'card_number',
        'expiry_date',
        'cvv',
        'issuing_bank',
        'bank_number',
        'invoice_amount',
        'signature_image',
        'attachments',
        'ip_address',
        'user_agent',
        'submitted_at',
    ];

    protected $casts = [
        'attachments' => 'array',
        'invoice_amount' => 'decimal:2',
        'submitted_at' => 'datetime',
        'card_number' => SafeEncrypted::class,
        'expiry_date' => SafeEncrypted::class,
        'cvv' => SafeEncrypted::class,
    ];

    /**
     * Card data must never leak through a stray dd(), toArray() or JSON response.
     */
    protected $hidden = [
        'card_number',
        'cvv',
        'expiry_date',
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    /**
     * "**** **** **** 1234" without decrypting anything, falling back to the
     * stored number for rows written before card_last_four existed.
     */
    public function getMaskedCardNumberAttribute(): string
    {
        $lastFour = $this->card_last_four
            ?: substr(preg_replace('/\D/', '', (string) $this->card_number), -4);

        return $lastFour ? '**** **** **** '.$lastFour : '****';
    }

    /**
     * Signatures are stored as a file path now, but older rows hold a raw
     * base64 data URI. Both need to resolve to something an <img> can render.
     */
    public function getSignatureUrlAttribute(): ?string
    {
        $signature = $this->signature_image;

        if (empty($signature)) {
            return null;
        }

        return str_starts_with($signature, 'data:') ? $signature : asset($signature);
    }

    public function getFullLocationAttribute(): string
    {
        return trim("{$this->city}, {$this->state} {$this->zip}", ', ');
    }
}
