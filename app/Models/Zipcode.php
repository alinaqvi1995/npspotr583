<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{
    protected $table = 'zipcodes';

    protected $fillable = [
        'zipcode',
        'city',
        'state',
        'statefull',
        'county',
        'country',
        'latitude',
        'longitude',
    ];

    public $timestamps = false;
}
