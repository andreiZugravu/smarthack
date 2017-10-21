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

//Landing page
Route::get('/', function () {
    return view('landing.index');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        return view('landing.index');
    });

    Route::get('/', [
        'as' => 'landing.index',
        'uses' => 'LandingPageController@index'
    ]);

//Teams

Route::get('/teams', [
    'as' => 'teams.index',
    'uses' => 'TeamsController@index'
]);



Route::get('/home', 'HomeController@index')->name('home');

//Users
Route::get('/users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
Route::get('/users/{user_id}', ['as' => 'users.show', 'uses' => 'UsersController@show']);

Route::put('/users/{user_id?}', ['as' => 'users.store', 'uses' => 'UsersController@store']);

Route::delete('/users/{user_id}', ['as' => 'users.remove', 'uses' => 'UsersController@remove']);

Auth::routes();

    Route::get('/tasks/index', [
        'as' => 'tasks.index',
        'uses' => 'LandingPageController@index'
    ]);

    Route::get('/teams', [
        'as' => 'teams.index',
        'uses' => 'TeamsController@index'
    ]);

});

