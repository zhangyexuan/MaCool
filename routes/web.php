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

Route::get('/Api/index',"Api\IndexController@index");
Route::get('/Api/jiexi',"Api\IndexController@jiexi");
Route::get('/Api/mulu',"Api\IndexController@mulu");
Route::get('/Api/hot',"Api\IndexController@hot");
Route::get('/Api',"Api\IndexController@control");
Route::get('/Api/chapter/{url}',"Api\IndexController@chapter")->name('chapter');
//---------------------------------------------------------------------------
// Route::get('/a',"Home\IndexController@list")->name('index');
Route::get('/',"Home\IndexController@index")->name('index');
Route::get('/list',"Home\IndexController@list")->name('index');
Route::get('/{id}',"Home\IndexController@article")->name('article');
Route::get('/{id}/{article}',"Home\IndexController@reader")->name('reader');
