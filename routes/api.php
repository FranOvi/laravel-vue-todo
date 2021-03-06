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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'guest:api'], function () {
    Route::get('/task', 'TaskController@get');
    Route::post('/task', 'TaskController@create');
    Route::put('/task/{task}', 'TaskController@update');
    Route::delete('/task/{task}', 'TaskController@delete');
});
