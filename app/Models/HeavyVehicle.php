<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeavyVehicle extends Model
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
        'trailer_type',
        'quote_id',
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}
