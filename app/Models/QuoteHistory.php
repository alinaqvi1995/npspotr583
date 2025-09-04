<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteHistory extends Model
{
    protected $fillable = [
        'quote_id',
        'status',
        'old_status',
        'changed_by',
        'change_type',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
