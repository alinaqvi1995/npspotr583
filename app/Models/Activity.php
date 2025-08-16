<?php

namespace App\Models;

use Spatie\Activitylog\Models\Activity as SpatieActivity;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Activity extends SpatieActivity
{
    /**
     * Casts for JSON / datetime columns.
     */
    protected $casts = [
        'properties'    => 'collection',
        'ip_address'    => 'string',
        'user_agent'    => 'string',
        'location'      => 'array',      // city, region, country
        'old_values'    => 'array',
        'new_values'    => 'array',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];

    /**
     * Example relationship: the user who caused the activity.
     */
    public function causer(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Example relationship: the model this activity is about.
     */
    public function subject(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Scope: latest first.
     */
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
