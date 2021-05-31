<?php

use Illuminate\Support\Facades\Route;
// use APP\Http\Controllers\API\Zapito\BaseServiceController;
use \App\Http\Controllers\API\Zapito\BaseServiceController;
use \App\Http\Controllers\API\Zapito\ZapitoController;

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


Route::get('/', function () {
    return redirect('/admin/login');
});

/** 
 * ######################
 * ####     BOTS     #### 
 * ######################
 */
Route::get('/api/bots', [ZapitoController::class, 'getBots']);
Route::get('/api/bots/{id}', [ZapitoController::class, 'getBotId']);

/** 
 * ######################
 * ####   MESSAGE    #### 
 * ######################
 */
Route::get('/api/messages/{id}', [ZapitoController::class, 'getMessages']);
Route::get('/api/massive', [ZapitoController::class, 'massive']);

Route::post('/api/messages', [ZapitoController::class, 'sendMessages']);
