<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table = 'director';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'FNAME',
        'LNAME',
        'BIRTH_DATE',
        'GENDER',
        'IMAGE'
    ];

    public function movies()
    {
        return $this->hasMany(Movie::class, 'DIRECTOR_ID', 'ID');
    }

    public function series()
    {
        return $this->hasMany(Series::class, 'DIRECTOR_ID', 'ID');
    }
}
