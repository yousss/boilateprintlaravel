<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'firstName',
        'lastName',
        'phonePrimary',
        'phoneSecondary',
        'addressLineOne',
        'addressLineTwo',
        'sex',  
    ];
    /**
     * Get the user's image.
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function user () 
    {
        return $this->belongsTo(User::class);
    }

}
