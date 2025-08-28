<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\InventarisController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::apiResource('datainventaris', [InventarisController::class, 'index']);
Route::get('datainventaris/{id}/{kode}', 'api\InventarisController@index');
Route::get('datanoinventaris/{id}/{nama}', 'api\InventarisController@datainventaris');
Route::get('datanidinventaris/{id}', 'api\InventarisController@dataidinventaris');
Route::get('datanoinventaris/{id}/{by}/{nama}', 'api\InventarisController@caridatabyinventaris');
Route::post('v1/authenticate/', 'api\InventarisController@authenticate');
Route::get('v2/authenticate/{user}/{pass}', 'api\InventarisController@authenticate_v2');


Route::prefix('gateway')->group(function () {
    Route::get('whatsapp', [ApiController::class, 'gateway_whatsapp'])->name('gateway_whatsapp');
    // Route::post('setup-notification', [DashboardController::class, 'dashboard_setup_notification'])->name('dashboard_setup_notification');
});
