<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTrustedIp extends Model
{
    protected $fillable = ['user_id', 'ip_address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at ? $this->created_at->format('Md, Y h:ia') : '-';
    }
}
