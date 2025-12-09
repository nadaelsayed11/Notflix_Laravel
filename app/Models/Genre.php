<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genre';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'genre_relation_movie', 'GENRE_ID', 'MOVIE_ID');
    }

    public function series()
    {
        return $this->belongsToMany(Series::class, 'genre_relation_series', 'GENRE_ID', 'SERIES_ID');
    }
}
