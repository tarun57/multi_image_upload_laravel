<?php

use Illuminate\Http\Request;

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
Route::post('save','Controller@save')->name('save');
Route::post('list','Controller@getList')->name('list');
Route::post('update','Controller@update')->name('update');
Route::post('delete','Controller@deleteRecord')->name('delete');