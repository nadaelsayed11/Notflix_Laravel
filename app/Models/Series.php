<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $table = 'series';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'NAME_SERIES',
        'YEAR',
        'DURATION_MIN',
        'DESCRIPTION',
        'LANGUAGE',
        'REVENUE',
        'BUDGET',
        'HOME_PAGE_LINK',
        'POSTER',
        'ADMIN_INSERTED_SERIES',
        'IMDB_RATE',
        'IMDB_RATE_COUNT',
        'NUMBER_OF_EPISODES_IN_SEASON',
        'DIRECTOR_ID',
        'PRIZE_WON_ID'
    ];

    // Actors relationship (many-to-many)
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_series', 'series_id', 'actor_id');
    }

    // Genres relationship (many-to-many)
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_relation_series', 'SERIES_ID', 'GENRE_ID');
    }
}
