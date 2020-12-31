<?php

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

Route::get('/','Welcome@index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add_user', 'HomeController@add_user')->name('home');
Route::get('/del_res/{id}', 'HomeController@del_res');
Route::get('/send/{user_mail}/{table_number}/{data}', 'mailController@send');
