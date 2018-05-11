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



Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
//Route::get('/prueba', 'HomeController@prueba')->name('prueb');
//Route::get('/', function () { return view('welcome'); }); 
//Route::get('dashboard', ['middleware' => 'country', function(){ return '<h1>Bienvenido!!</h1>'; }]);

Route::get('/unidades/select/{id}', ['as' => 'unidad.index','uses' => 'unidadController@index']);
Route::get('/unidades/planificacion', ['as' => 'unidad.plan','uses' => 'unidadController@planificar']);
