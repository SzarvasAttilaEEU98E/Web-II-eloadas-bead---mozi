<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdatbazisController;
use App\Http\Controllers\KapcsolatController;
use App\Http\Controllers\UzenetController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\DiagramController;

Route::get('/', function () {
    return view('fooldal');
})->name('fooldal');

Route::get('/adatbazis', [AdatbazisController::class, 'adatbazisLekero'])
    ->name('adatbazis');

Route::get('/kapcsolat', function () {
    return view('kapcsolat');
})->name('kapcsolat');

Route::post('/kapcsolat', [KapcsolatController::class, 'uzenetKuldes'])
    ->name('uzenet.kuldes');


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    Route::get('/uzenetek', [UzenetController::class, 'uzenetekLekero'])
        ->name('uzenetek');

    Route::get('/diagram', [DiagramController::class, 'getAll'])
        ->name('diagram');

    // Only with Admin permission
    Route::middleware('admin')->group(function () {
    
        Route::get('/admin', [AdminController::class, 'adminPage'])
                ->name('admin');

        Route::get('/admin/filmek', [FilmController::class, 'getAll'])
                ->name('admin.filmek.getAll');

        Route::get('/admin/filmek/create', [FilmController::class, 'create'])
                ->name('admin.filmek.create');

        Route::post('/admin/filmek', [FilmController::class, 'store'])
                ->name('admin.filmek.store');

        Route::get('/admin/filmek/{id}/edit', [FilmController::class, 'edit'])
                ->name('admin.filmek.edit');

        Route::put('/admin/filmek/{id}', [FilmController::class, 'update'])
                ->name('admin.filmek.update');

        Route::delete('/admin/filmek/{id}', [FilmController::class, 'destroy'])
                ->name('admin.filmek.destroy');
    });
});


require __DIR__.'/auth.php'