<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
            'state_name',
            'slug',
            'short_title',
            'banner_image',
            'heading_one',
            'description_one',
            'image_one',
            'heading_two',
            'description_two',
            'image_two',
            'heading_three',
            'description_three',
            'image_three',
            'heading_four',
            'description_four',
            'image_four',
        ];
}
