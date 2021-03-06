<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/show', function () {
//     return view('show');
// });

Route::get('/','StoreController@index');

Route::get('/store', 'StoreController@index');

Route::post('/store/create', 'StoreController@createStore');

Route::post('/store/delete', 'StoreController@deleteStore');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();