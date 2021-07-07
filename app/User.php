<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\QueryFilters\Active;
use App\QueryFilters\CountModel;
use App\QueryFilters\SortBy;
use Illuminate\Pipeline\Pipeline;

class User extends Authenticatable
{
    use Notifiable;

    public $with = ['recentPosts', 'posts'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function recentPosts()
    {
        return $this->posts()->where("created_at", ">=", now());
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function allUsers()
    {
        return app(Pipeline::class)
            ->send(self::query())
            ->through([
                Active::class,
                SortBy::class,
                // CountModel::class
            ])
            ->thenReturn()
            ->paginate();
    }


    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'follows_id', 'user_id')
            ->withTimestamps();
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follows_id')
            ->withTimestamps();
    }

    public function follow($userId)
    {
        $this->follows()->attach($userId);
        return $this;
    }

    public function unfollow($userId)
    {
        $this->follows()->detach($userId);
        return $this;
    }

    public function isFollowing($userId)
    {
        return (bool) $this->follows()->where('follows_id', $userId)->first(['id']);
    }
}
