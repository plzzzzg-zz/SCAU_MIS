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

Route::get('/','SitesController@index');
Route::get('/material','MaterialController@index');
Route::get('/material/add','MaterialController@add');
Route::post('/material/return','MaterialController@return_confirm');
Route::post('/material/lend','MaterialController@store_lend_info');
Route::get('/material/lend/{id}','MaterialController@add_lend_info');
Route::post('/material','MaterialController@add_material_type');

Route::get('/material/{id}','MaterialController@detail');

