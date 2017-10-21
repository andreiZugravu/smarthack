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

<<<<<<< HEAD


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

//Messages

Route::get('/messages/{message}', [
   'as' => 'messages.show',
   'uses' => 'MessagesController@show'
]);

Route::put('/messages/{messages?}', [
   'as' => 'messages.store',
   'uses' => 'MessagesController@store'
]);

Route::delete('/messages/{message}', [
   'as' => 'messages.remove',
   'uses' => 'MessagesController@remove'
]);

//Channel

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

=======
Route::group(['middleware' => ['auth']], function () {

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
>>>>>>> bd8676405b7d8ea635a67ea0a8339afa5a38e57f

//Users
    Route::get('/users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
    Route::get('/users/{user_id}', ['as' => 'users.show', 'uses' => 'UsersController@show']);

    Route::put('/users/{user_id?}', ['as' => 'users.store', 'uses' => 'UsersController@store']);

<<<<<<< HEAD
Route::get('/home', 'HomeController@index')->name('home');


   Route::get('/tasks/index', [
       'as' => 'tasks.index',
       'uses' => 'LandingPageController@index'
   ]);


=======
    Route::delete('/users/{user_id}', ['as' => 'users.remove', 'uses' => 'UsersController@remove']);

    Route::get('/tasks/index', [
        'as' => 'tasks.index',
        'uses' => 'LandingPageController@index'
    ]);
});
>>>>>>> bd8676405b7d8ea635a67ea0a8339afa5a38e57f


});
