<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\FiscalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/verificacion/', function () {
    return view('verificacion.fiscal');
});

Route::resource('mesa', MesaController::class)->middleware(['auth', 'verified']);
Route::resource('map', MapController::class)->middleware(['auth', 'verified']);

Route::resource('fiscal', FiscalController::class)->middleware(['auth', 'verified']);

Route::post('api/fetch-cities', [FiscalController::class, 'fetchCities']);

