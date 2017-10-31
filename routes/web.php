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


Route::group(['middleware' => ['auth']], function() {
    Route::resource('/tasks', 'TaskController');
});


Route::group(['prefix'=>'admin',
            'middleware' => ['admin'],
            'namespace' => 'Admin'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('/tasks', 'TaskController',['except' => ['create', 'store']]);
    Route::resource('/users', 'UsersController',['except' => ['create', 'store']]);
});

Route::get('/', 'HomeController@index')->name('home');
