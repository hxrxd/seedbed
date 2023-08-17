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
use App\Http\Controllers\UserController;
use App\Models\Mesa;
use App\Models\Fiscal;

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
    //return view('dashboard');
    if (Auth::user()->rol == "Admin") {
        $data = Mesa::distinct()->pluck('departamento');
    } else if (Auth::user()->rol == "Coordinador") {
        $data = [Auth::user()->location];
        if (Auth::user()->location == "CDGT") {
            $data = ['GUATEMALA'];
        }
    } else if (Auth::user()->rol == "Fiscal") {
        $fis = Fiscal::where("correo", Auth::user()->email)->first();
    }

    return view('dashboard', ['departments' => $data ?? [], 'fis' => $fis ?? []]);
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
Route::post('createstore', [VotoController::class,'createstore'])->name('createstore');
Route::post('acreditacionesdownload', [VerificacionController::class, 'getAcreditaciones'])->name('acreditacionesdownload')->middleware(['auth', 'verified']);
Route::post('api/fetch-cities', [FiscalController::class, 'fetchCities'])->middleware(['auth', 'verified'])->name('api.fetch.cities');
Route::post('api/fetch-jrvs-by-center', [FiscalController::class, 'fetchTablesByCenter'])->middleware(['auth', 'verified'])->name('api.fetch.jrvs.center');
Route::post('api/fetch-jrvs-by-city', [FiscalController::class, 'fetchTablesByCity'])->middleware(['auth', 'verified'])->name('api.fetch.jrvs.city');
Route::post('api/check-jrv-status', [FiscalController::class, 'checkJrvStatus'])->middleware(['auth', 'verified'])->name('api.check.jrv');
Route::post('api/check-dpi', [FiscalController::class, 'checkDPI'])->middleware(['auth', 'verified'])->name('api.check.dpi');
Route::post('api/post-fiscal', [FiscalController::class, 'store'])->middleware(['auth', 'verified'])->name('api.post.fiscal');
Route::post('api/update-fiscal', [FiscalController::class, 'updateFiscal'])->middleware(['auth', 'verified'])->name('api.update.fiscal');
Route::post('api/downgrade-fiscal', [FiscalController::class, 'downgradeFiscal'])->middleware(['auth', 'verified'])->name('api.downgrade.fiscal');;
Route::post('api/update-jrv', [FiscalController::class, 'updateJRV'])->middleware(['auth', 'verified'])->name('api.update.jrv');
Route::post('api/remove-jrv', [FiscalController::class, 'removeJRV'])->middleware(['auth', 'verified'])->name('api.remove.jrv');
Route::post('api/get-stats', [FiscalController::class, 'getStats'])->middleware(['auth', 'verified'])->name('get.stats');
Route::get('assignment', [FiscalController::class, 'addAssignment'])->middleware(['auth', 'verified'])->name('assignment');
Route::get('assignment/detail/{jrv}', [FiscalController::class, 'checkAssignment'])->middleware(['auth', 'verified'])->name('assignment.detail');
Route::get('assignments', [FiscalController::class, 'listAssignments'])->middleware(['auth', 'verified'])->name('assignments');
Route::get('assignments/new', [FiscalController::class, 'listJRVs'])->middleware(['auth', 'verified'])->name('add.jrv');
Route::get('resources', [FiscalController::class, 'showResources'])->middleware(['auth', 'verified'])->name('resources');

//Admin
Route::get('admin/fiscales', [FiscalController::class, 'adminListFiscales'])->middleware(['auth', 'verified'])->name('admin.fiscales');
Route::get('admin/fiscales/create', [FiscalController::class, 'adminCreateFiscal'])->middleware(['auth', 'verified'])->name('admin.fiscales.create');
Route::get('admin/assignments/{email}', [FiscalController::class, 'adminFiscalAssignments'])->middleware(['auth', 'verified'])->name('admin.assignments');
Route::get('admin/assignments/{email}/new', [FiscalController::class, 'listAdminJRVs'])->middleware(['auth', 'verified'])->name('add.jrv');
Route::get('admin/jrvs', [FiscalController::class, 'adminListMesas'])->middleware(['auth', 'verified'])->name('admin.jrvs');
Route::get('admin/users', [UserController::class, 'getUsers'])->middleware(['auth', 'verified'])->name('admin.users');
Route::get('admin/users/{email}/edit', [UserController::class, 'editUser'])->middleware(['auth', 'verified'])->name('admin.users.edit');
Route::post('admin/users/update', [UserController::class, 'updateUser'])->middleware(['auth', 'verified'])->name('admin.user.update');
Route::post('admin/authorize', [QRController::class, 'authorizeFiscal'])->middleware(['auth', 'verified'])->name('admin.authorize');
Route::get('admin/qr/{id}', [QRController::class, 'downloadAuthorization'])->middleware(['auth', 'verified'])->name('admin.qr');
Route::get('voto/create/{id}', [VotoController::class, 'create'])->middleware(['auth', 'verified'])->name('voto.create');

//Get routes
Route::get('getmesas', [ExcelController::class, 'getMesas'])->name('getmesas')->middleware(['auth', 'verified']);
Route::get('getmesassinfiscal', [ExcelController::class, 'getMesasSinFiscal'])->name('getmesassinfiscal')->middleware(['auth', 'verified']);
Route::get('getmesasconfiscal', [ExcelController::class, 'getMesasConFiscal'])->name('getmesasconfiscal')->middleware(['auth', 'verified']);
Route::get('getfiscal', [ExcelController::class, 'getFiscales'])->name('getfiscal')->middleware(['auth', 'verified']);
Route::get('getfiscalelectronico', [ExcelController::class, 'getFiscalesElectronicos'])->name('getfiscalelectronico')->middleware(['auth', 'verified']);
Route::get('getvotosmuestra', [ExcelController::class, 'getVotosMuestra'])->name('getmesas')->middleware(['auth', 'verified']);
Route::get('voto.muestra', [VotoController::class, 'indexMuestra'])->name('voto.muestra')->middleware(['auth', 'verified']);

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

