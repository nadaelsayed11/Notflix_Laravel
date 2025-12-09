<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    protected $table = 'prize';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'TITLE',
        'TYPE_OF_PRIZE'
    ];
}
