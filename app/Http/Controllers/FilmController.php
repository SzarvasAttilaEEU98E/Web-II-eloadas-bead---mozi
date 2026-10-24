<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Http\Requests\FilmRequest;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        $filmek = Film::all();

        return view('admin.filmek.getAll', compact('filmek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.filmek.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FilmRequest  $request)
    {
        Film::create($request->validated());

        return redirect()->route('admin.filmek.getAll')
            ->with('success', 'Film sikeresen hozzáadva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = Film::findOrFail($id);

        return view('admin.filmek.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FilmRequest  $request, string $id)
    {
        $film = Film::findOrFail($id);

        $film->update($request->validated());

        return redirect()->route('admin.filmek.getAll');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::findOrFail($id);

        $film->delete();

        return redirect()->route('admin.filmek.getAll');
    }
}
