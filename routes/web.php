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



Route::get('/welcome','Controller@getIndex')->name('index');
 Route::get('/', function () {
    return view('welcome');
 });
 Route::post('saveOrUpdate','Controller@saveOrUpdate')->name('saveOrUpdate');
Route::post('list','Controller@getList')->name('list');
Route::post('delete','Controller@deleteRecord')->name('delete');


Route::get('/index', function () {
    return view('admin/index');
});

Route::resource('info','Infocontroller');


Route::resource('upload','UploadController');

Route::resource('input','InputController');


Route::resource('fetchdata', 'AjaxController@index');


Route::get('/model', function () {
    return view('model');
});

Route::get('grid',function(){
return view('grid');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','AdminController@index')->name('admin');

Route::prefix('admin')->group(function(){
Route::get('/login', 'Auth\AdminLoginController@showLoginForm');

Route::post('/login', 'Auth\AdminLoginController@login')->name('admin-login');



Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin-logout');
});
