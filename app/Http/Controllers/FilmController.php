<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Models\Film;
use Illuminate\Database\QueryException;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        $filmek = Film::withCount('eloadasok')->get();

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
    public function store(FilmRequest $request)
    {
        Film::create($request->validated());

        return redirect()
            ->route('admin.filmek.getAll')
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
    public function update(FilmRequest $request, string $id)
    {
        $film = Film::findOrFail($id);

        $film->update($request->validated());

        return redirect()
            ->route('admin.filmek.getAll')
            ->with('success', 'Film sikeresen módosítva!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::findOrFail($id);

        if ($film->eloadasok()->exists()) {
            return redirect()
                ->route('admin.filmek.getAll')
                ->with(
                    'error',
                    'A film nem törölhető, mert előadások tartoznak hozzá!'
                );
        }

        try {
            $film->delete();
        } catch (QueryException $exception) {
            return redirect()
                ->route('admin.filmek.getAll')
                ->with(
                    'error',
                    'A film nem törölhető, mert kapcsolódó adatok hivatkoznak rá.'
                );
        }

        return redirect()
            ->route('admin.filmek.getAll')
            ->with('success', 'Film sikeresen törölve!');
    }
}
