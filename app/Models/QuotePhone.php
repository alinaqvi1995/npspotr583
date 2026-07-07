<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivity;

class QuotePhone extends Model
{
    use LogsActivity;
    protected $fillable = [
        'quote_location_id',
        'type',
        'phone',
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function getMaskedPhoneAttribute(): string
    {
        $phone = $this->phone;

        if (empty($phone)) {
            return '';
        }

        // Remove non-numeric characters
        $clean = preg_replace('/\D/', '', $phone);

        if (strlen($clean) <= 4) {
            return $clean;
        }

        $visible = substr($clean, -4);
        $masked = str_repeat('*', strlen($clean) - 4);

        return $masked . $visible;
    }
}
