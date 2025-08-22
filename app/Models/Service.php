<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'heading_one',
        'description_one',
        'image_one',
        'heading_two',
        'description_two',
        'image_two',
        'description_two_one',
        'description_two_two',
        'description_two_three',
        'description_two_four',
        'description_two_five',
        'description_two_six',
        'description_two_seven',
        'heading_three',
        'description_three',
        'image_three',
        'image_four',

        'category_id',
        'subcategory_id',

        'slug',
        'title',

        'created_by',

        'status',
        'ques_one',
        'ans_one',
        'ques_two',
        'ans_two',
        'ques_three',
        'ans_three',
        'ques_four',
        'ans_four',
        'ques_five',
        'ans_five',
    ];

    protected $casts = [
        'status' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at ? $this->created_at->format('Md, Y h:ia') : '-';
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at ? $this->updated_at->format('Md, Y h:ia') : '-';
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getStatusFormattedAttribute()
    {
        return $this->status == 1 ? 'Active' : 'Inactive';
    }

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 1:
                return '<span class="badge bg-success">Active</span>';
            case 0:
                return '<span class="badge bg-danger">Inactive</span>';
            default:
                return '<span class="badge bg-secondary">Unknown</span>';
        }
    }

    public function categoryName()
    {
        return $this->category ? $this->category->name : 'N/A';
    }

    public function subcategoryName()
    {
        return $this->subcategory ? $this->subcategory->name : 'N/A';
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($blog) {
            if (empty($blog->slug)) {
                $baseSlug = Str::slug($blog->title ?? $blog->heading_one ?? uniqid());
                $slug = $baseSlug;
                $count = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $count++;
                }
                $blog->slug = $slug;
            }
        });
    }
}
