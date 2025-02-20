<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image_path',
        'body',
        'source_url',
        'source_title',
    ];

    /**
     * Order posts by last updated at
     */
    public function scopeLatestCreated($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Runs when post is created
     * Generates a slug for each post
     * If a post has the slug as the previous one
     * it will add a number to it to keep it unique
     */
    protected static function booted()
    {
        static::creating(function ($post) {
            $post->slug = Post::where('slug', $slug = Str::slug($post->title))
                ->exists() ? $slug . '-' . uniqid() : $slug;
        });
    }
}
