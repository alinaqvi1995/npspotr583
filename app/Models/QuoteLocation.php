<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteLocation extends Model
{
    use HasFactory;

    protected $table = 'quote_locations';

    protected $fillable = [
        'quote_id',
        'type', // pickup or delivery
        'name',
        'location_type',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'buyer_ref',
        'contact_name',
        'contact_email',
        'twic',
        'save_to_address_book',
    ];

    /**
     * Relationships
     */

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function phones()
    {
        return $this->hasMany(QuotePhone ::class);
    }
}
