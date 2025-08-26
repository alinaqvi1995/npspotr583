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
        'type',
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

    protected $casts = [
        'twic' => 'boolean',
    ];
    
    public function getFullLocationAttribute()
    {
        return "{$this->city}, {$this->state}, {$this->zip}";
    }

    public function setPickupLocationAttribute($value)
    {
        $this->parseAndAssignLocation($value, 'pickup');
    }

    public function setDeliveryLocationAttribute($value)
    {
        $this->parseAndAssignLocation($value, 'delivery');
    }

    private function parseAndAssignLocation($value, $type)
    {
        if (!$value) {
            return;
        }

        $parts = array_map('trim', explode(',', $value));

        $city = $parts[0] ?? null;
        $state = $parts[1] ?? null;
        $zip = $parts[2] ?? null;

        $this->attributes['city'] = $city;
        $this->attributes['state'] = $state;
        $this->attributes['zip'] = $zip;
        $this->attributes['type'] = $type;
    }

    /**
     * Relationships
     */

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function phones()
    {
        return $this->hasMany(QuotePhone::class);
    }
}
