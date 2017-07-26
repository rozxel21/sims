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

/*
	Major edit

*/

Route::resource('college', 'CollegeController', ['except' => 'show']);
Route::resource('course', 'CourseController', ['except' => 'show']);
Route::resource('major', 'MajorController', ['except' => 'show']);

Route::get('/test/major', 'MajorController@test');