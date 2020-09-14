<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Routes Admin
Route::prefix('admin')
  ->namespace('Admin')
  ->middleware('auth')
  ->name('admin.')
  ->group(function(){
  Route::resource('workouts','WorkoutController');
});

Route::get('/workouts','WorkoutController@index')->name('workout.index');
Route::get('/workouts{workout}','WorkoutController@show')->name('workout.show');
