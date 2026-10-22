<?php

namespace App\Http\Controllers;

use App\Http\Requests\UzenetRequest;
use App\Models\Uzenet;

class KapcsolatController extends Controller
{
    public function uzenetKuldes(UzenetRequest $request)
    {
        Uzenet::create($request->validated());

        return redirect()
            ->route('kapcsolat')
            ->with('success', 'Üzenet sikeresen elküldve!');
    }
}