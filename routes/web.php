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

//first part - counting the number of visits
Route::get('task_1','Indexcontroller@index');
Route::get('task_1','Indexcontroller@add');
Route::get('task_1_1','Indexcontroller@show');

//second part - images market
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('create', 'HomeController@create');
Route::post('store', 'HomeController@store')->name('store');
Route::get('image{id}', 'HomeController@show');
Route::get('predelete','HomeController@predelete');
Route::post('delete','HomeController@delete')->name('delete');
