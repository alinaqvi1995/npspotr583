<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotePhone extends Model
{
    protected $fillable = [
        'quote_id',
        'type',
        'phone',
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}
