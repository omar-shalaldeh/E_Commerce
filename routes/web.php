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

use laravelforum\Http\Controllers\UsersController;

Route::get('/','DisscussionController@index')->name('discussion.index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/discussion','DisscussionController');

Route::resource('discussion/{discussion}/replies','ReplyController');
Route::get('/notifications',[UsersController::class,'notificaitons'])->name('users.notifications');
Route::post('discussion/{discussion}/replies/{reply}/make-best-reply','DisscussionController@Reply')->name('mark-best.reply');
