<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Blog extends Model
{
    /** @use HasFactory<\Database\Factories\BlogFactory> */
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured_image',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];
}
