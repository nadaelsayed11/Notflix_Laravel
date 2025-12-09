<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actor';       // table name (not plural)
    protected $primaryKey = 'ID';     // custom primary key
    public $timestamps = false;       // no created_at/updated_at

    protected $fillable = [
        'FNAME',
        'LNAME',
        'GENDER',
        'BIRTH_DATE',
        'IMAGE'
    ];

    // Movies relationship (many-to-many)
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'actor_movie', 'actor_id', 'movie_id');
    }

    // Series relationship (many-to-many)
    public function series()
    {
        return $this->belongsToMany(Series::class, 'actor_series', 'actor_id', 'series_id');
    }

    // Prizes won for movies (many-to-many with pivot data)
    public function moviePrizes()
    {
        return $this->belongsToMany(Prize::class, 'actor_prize_movie', 'ACTOR_ID', 'PRIZE_ID')
            ->withPivot('MOVIE_ID', 'YEAR');
    }

    // Prizes won for series (many-to-many with pivot data)
    public function seriesPrizes()
    {
        return $this->belongsToMany(Prize::class, 'actor_prize_series', 'ACTOR_ID', 'PRIZE_ID')
            ->withPivot('SERIES_ID', 'YEAR');
    }
}
