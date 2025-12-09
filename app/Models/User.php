<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'gender',
        'image',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's favorite movies
     */
    public function favoriteMovies()
    {
        return $this->belongsToMany(
            \App\Models\Movie::class,
            'add_to_fav_movie',
            'user_id',
            'MOVIE_ID',
            'id',
            'ID'
        )->withTimestamps();
    }

    /**
     * Get the user's favorite series
     */
    public function favoriteSeries()
    {
        return $this->belongsToMany(
            \App\Models\Series::class,
            'add_to_fav_series',
            'user_id',
            'SERIES_ID',
            'id',
            'ID'
        )->withTimestamps();
    }

    /**
     * Check if user is admin
     */
    public function isAdmin()
    {
        return $this->type === 'admin';
    }

    /**
     * Get user's avatar URL
     */
    public function getAvatarUrlAttribute()
    {
        return asset('images/user_pics/' . $this->image);
    }
}
