<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdatbazisController;
use App\Http\Controllers\KapcsolatController;
use App\Http\Controllers\UzenetController;

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

Route::get('/uzenetek', [UzenetController::class, 'uzenetekLekero'])
    ->name('uzenetek');

//TEST
/*
    Route::get('/session-test', function () {
    session(['teszt' => 'mukodik']);

    return response()->json([
        'session_id' => session()->getId(),
        'teszt' => session('teszt'),
    ]);
});
*/

require __DIR__.'/auth.php';