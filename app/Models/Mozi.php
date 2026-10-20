<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mozi extends Model
{
    protected $fillable = [
        'nev',
        'varos',
        'ferohely',
    ];

    public function eloadasok()
    {
        return $this->hasMany(Eloadas::class, 'mozi_id');
    }
}