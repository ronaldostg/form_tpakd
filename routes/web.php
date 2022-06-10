<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DependantDropdownController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\WilayahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[FormController::class,'create']);


Route::get('/load-data',[FormController::class,'loadData']);

Route::resource('form-tpakd', FormController::class);

// Route::get('form-daerah', [DependantDropdownController::class,'formDaerah']);



// Route::get('provinces', [DependantDropdownController::class,'provinces'])->name('provinces');
// Route::get('cities', [DependantDropdownController::class,'cities'])->name('cities');

// Route::get('districts', [DependantDropdownController::class,'districts'])->name('districts');
// Route::get('villages', [DependantDropdownController::class,'villages'])->name('villages');



Route::get('kabupaten', [WilayahController::class,'getKabupaten'])->name('kabupaten');
Route::get('kecamatan', [WilayahController::class,'getKecamatan'])->name('kecamatan');
Route::get('desakel', [WilayahController::class,'getDesaKel'])->name('desakel');

 

