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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'HomeController@create')->name('create');
Route::post('/store', 'HomeController@store')->name('store');
Route::get('/show/{id}', 'HomeController@show')->name('show');
Route::get('/edit/{id}', 'HomeController@edit')->name('edit');

Route::post('/posts/{post_id}/comments','CommentsController@store');

Route::get('/users/show/{id}', 'UsersController@show')->name('show');

Route::group(['middleware' => 'basicauth'], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});