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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sendnotif', 'OrderController@sendNotifiation');
Route::get('/accessnotif', 'OrderController@accessNotifiation');

Auth::routes();

Route::get('/me', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('order', 'OrderController');
