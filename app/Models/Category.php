<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'created_by',
        'modified_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'modified_by');
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    protected static function booted()
    {
        static::creating(function ($category) {
            if (Auth::check()) {
                $category->created_by = Auth::id();
                $category->modified_by = Auth::id();
            }
        });

        static::updating(function ($category) {
            if (Auth::check()) {
                $category->modified_by = Auth::id();
            }
        });
    }
}
