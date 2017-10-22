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


//Testing
    Route::get('/testing', function () {
        return view('testing.index');
    });


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

    Route::put('teams/addUser/{team}', [
        'as' => 'teams.addUser',
        'uses' => 'TeamsController@addUser'
    ]);

    Route::put('teams/removeUser/{team}', [
        'as' => 'teams.removeUser',
        'uses' => 'TeamsController@removeUser'
    ]);

//Messages

    Route::get('/messages/{channel?}', [
        'as' => 'messages.index',
        'uses' => 'MessagesController@index'
    ]);

    Route::put('/messages/{message?}', [
        'as' => 'messages.store',
        'uses' => 'MessagesController@store'
    ]);

    Route::delete('/messages/{message}', [
        'as' => 'messages.remove',
        'uses' => 'MessagesController@remove'
    ]);

//Channels

    Route::get('/channels', [
        'as' => 'channels.index',
        'uses' => 'ChannelsController@index'
    ]);

    Route::get('/channels/{channel}', [
        'as' => 'channels.show',
        'uses' => 'ChannelsController@show'
    ]);

    Route::put('/channels/{channel?}', [
        'as' => 'channels.store',
        'uses' => 'ChannelsController@store'
    ]);

    Route::delete('/channel/{channel}', [
        'as' => 'channels.remove',
        'uses' => 'ChannelsController@remove'
    ]);


//Users
    Route::get('/users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
    Route::get('/users/{user_id}', ['as' => 'users.show', 'uses' => 'UsersController@show']);

    Route::put('/users/{user_id?}', ['as' => 'users.store', 'uses' => 'UsersController@store']);

    Route::delete('/users/{user_id}', ['as' => 'users.remove', 'uses' => 'UsersController@remove']);

    //Tasks

    Route::get('/tasks/index', [
        'as' => 'tasks.index',
        'uses' => 'TasksController@index'
    ]);

    Route::get('/tasks/{task}', [
        'as' => 'tasks.show',
        'uses' => 'TasksController@show'
    ]);

    Route::put('/tasks/{task?}', [
        'as' => 'tasks.store',
        'uses' => 'TasksController@store'
    ]);

    Route::delete('/tasks/{task}', [
        'as' => 'tasks.remove',
        'uses' => 'TasksController@remove'
    ]);

    Route::put('/tasks/{task}', [
        'as' => 'tasks.remove',
        'uses' => 'TasksController@remove'
    ]);

    Route::put('tasks/addUser/{task}', [
        'as' => 'tasks.addUser',
        'uses' => 'TasksController@addUser'
    ]);

    Route::put('tasks/removeUser/{task}', [
        'as' => 'tasks.removeUser',
        'uses' => 'TasksController@removeUser'
    ]);
});