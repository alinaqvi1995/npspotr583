<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotePayment extends Model
{
    protected $fillable = [
        'quote_id',
        'amount',
        'channel',
        'status',
        'notes',
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}
