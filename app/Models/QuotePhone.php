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
}
