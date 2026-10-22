<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Mozi;
use App\Models\Eloadas;

class AdatbazisController extends Controller
{
    public function adatbazisLekero()
    {
        $filmek = Film::all();
        $mozik = Mozi::all();
        $eloadasok = Eloadas::with(['film', 'mozi'])->paginate(20);

        return view('adatbazis', compact('filmek', 'mozik', 'eloadasok'));
    }
}