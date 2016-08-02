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
    return view('welcome');
});

Route::get('/skills', function () {
    return App\Skill::all();
});

Route::get('/projects', function () {
    return App\Project::all();
});

Route::get('/links', function () {
    return App\Link::all();
});

Route::get('/profile', function () {
    return App\User::find(1)->profile;
});

Route::get('/commands', function () {
    return config('commands.list');
});

Route::get('/contact', 'ContactController@create');
Route::post('/contact', 'ContactController@store');
