<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Mozi;
use App\Models\Eloadas;

class AdatbazisController extends Controller
{
    public function filmLekero()
{
    $filmek = Film::all();

    return view('adatbazis', compact('filmek'));
}
}