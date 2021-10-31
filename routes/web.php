<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', 'SiteController@index')->name('main');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('courses', 'Website\CourseController')->only('index', 'show');
Route::resource('categories', 'Website\CategoryController')->only('index', 'show');
Route::get('/changeCategory','SiteController@changeCategory')->name('change_category');

Route::get('courses_enroll/{course}', 'Website\CourseController@enroll')->name('course.enroll')->middleware('auth');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'admin', 'namespace' => 'Dashboard'], function () {
    Route::get('/','MainController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');


    Route::resource('courses', 'CourseController');

    Route::resource('courses', 'CourseController')->except('index', 'create', 'store');
    Route::get('/changeCategory/{Category}','CourseController@changeCategory');

});
