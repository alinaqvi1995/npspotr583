<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleImage extends Model
{
    protected $fillable = [
        'quote_id',
        'vehicle_id',
        'image_path',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}
