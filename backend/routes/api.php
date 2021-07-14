<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/tools', [ToolsController::class, 'index']);
Route::get('/tools/{id}', [ToolsController::class, 'show']);
Route::delete('/tools/{id}', [ToolsController::class, 'destroy']);
Route::post('/tools', [ToolsController::class, 'store']);
Route::get('/tools/{type}/{term}', [ToolsController::class, 'search']);
