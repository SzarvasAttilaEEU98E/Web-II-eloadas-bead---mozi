<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdatbazisController;
use App\Http\Controllers\KapcsolatController;
use App\Http\Controllers\UzenetController;
use App\Http\Controllers\AdminController;

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

    Route::get('/admin', [AdminController::class, 'adminPage'])
        ->name('admin');
});

require __DIR__.'/auth.php';