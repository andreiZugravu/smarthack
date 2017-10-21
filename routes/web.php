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

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        return view('landing.index');
    });

    Route::get('/', [
        'as' => 'landing.index',
        'uses' => 'LandingPageController@index'
    ]);

    Route::get('/tasks/index', [
        'as' => 'tasks.index',
        'uses' => 'LandingPageController@index'
    ]);

    Route::get('/teams', [
        'as' => 'teams.index',
        'uses' => 'TeamsController@index'
    ]);

});

