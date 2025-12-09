<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movie';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'NAME_MOVIE',
        'YEAR',
        'DURATION_MIN',
        'DESCRIPTION_OF_MOVIE',
        'LANGUAGE_MOBIE',
        'REVENUE',
        'BUDGET',
        'HOME_PAGE_LINK',
        'POSTER',
        'ADMIN_INSERTED_MOVIE',
        'IMDB_RATE',
        'IMDB_RATE_COUNT',
        'DIRECTOR_ID',
        'PRIZE_WON_ID',
        'STORY_ID'
    ];

    // Actors relationship (many-to-many)
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_movie', 'movie_id', 'actor_id');
    }

    // Genres relationship (many-to-many)
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_relation_movie', 'MOVIE_ID', 'GENRE_ID');
    }
}
