<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleMakeModel extends Model
{
    protected $table = 'wp_vehiclelisting';
    public $timestamps = false;

    protected $fillable = [
        'make',
        'model',
        'UserId',
        'size',
        'status'
    ];
}
