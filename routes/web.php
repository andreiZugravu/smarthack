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

//Testing
    Route::get('/testing', function () {
        return view('testing.index');
    });

//Teams

    Route::get('/teams', [
        'as' => 'teams.index',
        'uses' => 'TeamsController@index'
    ]);

    Route::get('/teams/{team}', [
        'as' => 'teams.show',
        'uses' => 'TeamsController@show'
    ]);

    Route::put('/teams/{team?}', [
        'as' => 'teams.store',
        'uses' => 'TeamsController@store'
    ]);

    Route::delete('/teams/{team}', [
        'as' => 'teams.remove',
        'uses' => 'TeamsController@remove'
    ]);

//Messages
    Route::put('/m/{message?}', [
        'as' => 'm.store',
        'uses' => 'MessagesController@store'
    ]);

//Users
    Route::get('/users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
    Route::get('/users/{user_id}', ['as' => 'users.show', 'uses' => 'UsersController@show']);

    Route::put('/users/{user_id?}', ['as' => 'users.store', 'uses' => 'UsersController@store']);

    Route::delete('/users/{user_id}', ['as' => 'users.remove', 'uses' => 'UsersController@remove']);

    Route::get('/home', 'HomeController@index')->name('home');


    Route::get('/tasks/index', [
        'as' => 'tasks.index',
        'uses' => 'LandingPageController@index'
    ]);






});