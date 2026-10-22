<?php

namespace App\Http\Controllers;

use App\Models\Uzenet;

class UzenetController extends Controller
{
    public function uzenetekLekero()
    {
        $uzenetek = Uzenet::orderBy('created_at', 'desc')->paginate(10);

        return view('uzenetek', compact('uzenetek'));
    }
}