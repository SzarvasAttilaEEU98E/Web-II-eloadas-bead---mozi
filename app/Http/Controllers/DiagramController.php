<?php

namespace App\Http\Controllers;

use App\Models\Film;

class DiagramController extends Controller
{
    public function getAll()
    {
        $filmek = Film::withSum('eloadasok', 'nezoszam')
            ->orderByDesc('eloadasok_sum_nezoszam')
            ->limit(10)
            ->get();

        return view('diagram', compact('filmek'));
    }
}
