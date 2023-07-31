<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\FiscalController;
use App\Http\Controllers\VerificacionController;
use App\Http\Controllers\QRController;
use App\Http\Controllers\VotoController;
use App\Http\Controllers\ExcelController;
use App\Models\Mesa;

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
    //return view('welcome');
    return view('termporal');

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

//Resource routes
Route::resource('mesa', MesaController::class)->middleware(['auth', 'verified']);
Route::resource('map', MapController::class)->middleware(['auth', 'verified']);
Route::resource('verificacion', VerificacionController::class);
Route::resource('qr', QRController::class)->middleware(['auth', 'verified']);
Route::resource('fiscal', FiscalController::class)->middleware(['auth', 'verified']);
Route::resource('voto', VotoController::class)->middleware(['auth', 'verified']);

//Post routes
Route::post('api/fetch-cities', [FiscalController::class, 'fetchCities']);
Route::post('api/fetch-jrvs-by-center', [FiscalController::class, 'fetchTablesByCenter']);
Route::post('api/fetch-jrvs-by-city', [FiscalController::class, 'fetchTablesByCity']);
Route::post('api/check-jrv-status', [FiscalController::class, 'checkJrvStatus']);
Route::post('api/post-fiscal', [FiscalController::class, 'store']);
Route::post('api/update-fiscal', [FiscalController::class, 'updateFiscal']);
Route::post('api/downgrade-fiscal', [FiscalController::class, 'downgradeFiscal']);
Route::post('api/update-jrv', [FiscalController::class, 'updateJRV']);
Route::post('api/remove-jrv', [FiscalController::class, 'removeJRV']);
Route::get('assignment', [FiscalController::class, 'addAssignment'])->middleware(['auth', 'verified'])->name('assignment');
Route::get('assignment/detail/{jrv}', [FiscalController::class, 'checkAssignment'])->middleware(['auth', 'verified'])->name('assignment.detail');
Route::get('assignments', [FiscalController::class, 'listAssignments'])->middleware(['auth', 'verified'])->name('assignments');
Route::get('add-jrv', [FiscalController::class, 'listJRVs'])->middleware(['auth', 'verified'])->name('add.jrv');
Route::get('resources', [FiscalController::class, 'showResources'])->middleware(['auth', 'verified'])->name('resources');

//Get routes
Route::get('getmesas', [ExcelController::class, 'getMesas'])->name('getmesas')->middleware(['auth', 'verified']);
Route::get('getmesassinfiscal', [ExcelController::class, 'getMesasSinFiscal'])->name('getmesassinfiscal')->middleware(['auth', 'verified']);
Route::get('getmesasconfiscal', [ExcelController::class, 'getMesasConFiscal'])->name('getmesasconfiscal')->middleware(['auth', 'verified']);
Route::get('getfiscal', [ExcelController::class, 'getFiscales'])->name('getfiscal')->middleware(['auth', 'verified']);
Route::get('getfiscalelectronico', [ExcelController::class, 'getFiscalesElectronicos'])->name('getfiscalelectronico')->middleware(['auth', 'verified']);

//Route::patch('assign/{jrv}', [FiscalController::class,'updateJRV'])->name('assign.updateJRV');

Route::get('/previous', function () {
    return back();
});

Route::get('/assets/img/{filename}', function($filename){
        $path = 'assets/img/' . $filename;

        if (Storage::exists($path)) {
            return response()->file(storage_path('app/' . $path));
        }
        abort(404);
});

