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

Route::get('/', 'SchoolController@index');
//resources
Route::resource('students', 'StudentsController');
Route::resource('courses', 'CoursesController');
Route::resource('users', 'UsersController');
Route::resource('school', 'SchoolController');
Auth::routes();


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
