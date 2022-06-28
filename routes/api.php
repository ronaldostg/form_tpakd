<?php

use App\Http\Controllers\ApiTpakdController;
use App\Http\Controllers\FormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware'=>'api',
    
],function () {
    
    // manage user login and register from client
    // Route::get('/all-data', [FormController::class, 'allDataApi']);
    
    // Route::resource('data-tpakd', ApiTpakdController::class);

    Route::post('all-pengajuan', [ApiTpakdController::class, 'index']);
    // Route::post('detail-pengajuan', [ApiTpakdController::class, 'index']);
    Route::post('detail-pengajuan', [ApiTpakdController::class, 'show']);
 
    

});
