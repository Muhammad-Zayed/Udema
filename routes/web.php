<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', 'SiteController@index')->name('main');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('courses', 'Website\CourseController')->only('index', 'show');
Route::resource('categories', 'Website\CategoryController')->only('index', 'show');
Route::get('/changeCategory','SiteController@changeCategory');

Route::get('courses_enroll/{course}', 'Website\CourseController@enroll')->name('course.enroll')->middleware('auth');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'admin', 'namespace' => 'Dashboard'], function () {
    Route::get('/','MainController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');


    route::post('courses/{category}', 'CourseController@store')->name('courses.store');
    route::get('courses/create/{category}', 'CourseController@create')->name('courses.create');
    Route::resource('courses', 'CourseController')->except('index', 'create', 'store');

});
