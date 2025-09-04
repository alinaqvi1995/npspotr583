<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivity;

class VehicleImage extends Model
{
    use LogsActivity;

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
