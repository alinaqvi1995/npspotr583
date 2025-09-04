<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivity;

class Vehicle extends Model
{
    use LogsActivity;
    protected $fillable = [
        'make',
        'model',
        'year',
        'color',
        'vin',
        'length_ft',
        'length_in',
        'width_ft',
        'width_in',
        'height_ft',
        'height_in',
        'weight',
        'condition',
        'modified', 
        'modified_info',
        'available_at_auction', 
        'available_link',
        'trailer_type',
        'load_method',
        'unload_method',
        'type', 
        'quote_id',
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function images()
    {
        return $this->hasMany(VehicleImage::class);
    }
}
