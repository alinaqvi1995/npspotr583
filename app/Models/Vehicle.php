<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'make',
        'model',
        'year',
        'color',
        'vin',
        'length',
        'width',
        'height',
        'quote_id',
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}
