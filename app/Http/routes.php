<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('content.welcome');
});

get('movies', [
    'as'   => 'get.movies',
    'uses' => 'MovieController@getMovies'
]);

post('movies', [
    'as'   => 'post.movies',
    'uses' => 'MovieController@postMovies'
]);

get('actors', [
    'as'   => 'get.actors',
    'uses' => 'ActorController@getActors'
]);

get('actors/details/{id}', [
    'as'   => 'get.actors.details',
    'uses' => 'ActorController@getActorDetails'
]);

get('directors', [
    'as'   => 'get.directors',
    'uses' => 'DirectorController@getDirectors'
]);

get('directors/details/{id}', [
    'as'   => 'get.directors.details',
    'uses' => 'DirectorController@getDirectorDetails'
]);

get('directors/search', [
    'as'   => 'post.search.directors',
    'uses' => 'DirectorController@searchDirectors'
]);
