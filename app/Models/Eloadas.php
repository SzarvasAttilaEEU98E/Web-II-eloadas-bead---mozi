<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eloadas extends Model
{

    protected $table = 'eloadas';
    protected $fillable = [
        'film_id',
        'mozi_id',
        'datum',
        'nezoszam',
        'bevetel',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }

    public function mozi()
    {
        return $this->belongsTo(Mozi::class, 'mozi_id');
    }
}