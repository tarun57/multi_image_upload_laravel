<?php

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
    return view('welcome');
});
Route::get('/index', function () {
    return view('admin/index');
});


Route::resource('info','InfoController');

Route::get('/multi', function () {
    return view('admin/multi');
})->name('multi');

Route::post('/multi', 'UploadController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','AdminController@index')->name('admin');

Route::prefix('admin')->group(function(){
Route::get('/login', 'Auth\AdminLoginController@showLoginForm');

Route::post('/login', 'Auth\AdminLoginController@login')->name('admin-login');



Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin-logout');
});
