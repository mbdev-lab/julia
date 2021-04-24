<?php

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

Route::post('/registration', [\App\Http\Controllers\UserController::class, 'registration']);
Route::get('/posts', [\App\Http\Controllers\PostController::class, 'list']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
