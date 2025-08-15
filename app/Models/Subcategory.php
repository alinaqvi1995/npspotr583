<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Subcategory extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'status',
        'created_by',
        'modified_by',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'modified_by');
    }

    protected static function booted()
    {
        static::creating(function ($subcategory) {
            if (Auth::check()) {
                $subcategory->created_by = Auth::id();
                $subcategory->modified_by = Auth::id();
            }
        });

        static::updating(function ($subcategory) {
            if (Auth::check()) {
                $subcategory->modified_by = Auth::id();
            }
        });
    }
}
