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
Route::post('/create','cartesController@create');
Route::get('/cartes','cartesController@index');
Route::delete('/cartes/{id}','cartesController@destroy');
Route::get('/edit/{id}', 'cartesController@edit');
Route::post('/update/{id}','cartesController@update');