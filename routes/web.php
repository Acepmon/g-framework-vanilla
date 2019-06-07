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

Route::get('/test/blank', function () {
    return view('test.blank');
});

Route::get('/test/example', function () {
    return view('test.example');
});

Route::resource('roles', 'RoleController');

Route::resource('pages', 'PageController');
Route::get('pages/{id}/metas', 'PageController@metasIndex');
Route::get('pages/{id}/metas/{id}', 'PageMetaController@index');

