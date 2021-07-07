<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable= [
        'body', 
        'title'
    ];

    public function author () 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    /**
     * Get the post's image.
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    /**
     * Get all of the tags for the post.
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
