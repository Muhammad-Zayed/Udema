<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Home Page 
Route::get('/', 'SiteController@index')->name('main');

/**************************************************************************/

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/**************************************************************************/
// Website Routes 
Route::resource('courses', 'Website\CourseController')->only('index', 'show');
Route::resource('categories', 'Website\CategoryController')->only('index', 'show');
// Ajax => Select Category in Courses Page 
Route::get('/changeCategory','SiteController@changeCategory')->name('change_category');
Route::get('courses_enroll/{course}', 'Website\CourseController@enroll')->name('course.enroll')->middleware('auth');

/**************************************************************************/

//Dashboard Routes

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'admin', 'namespace' => 'Dashboard'], function () {
    Route::get('/','MainController@index')->name('home');
    
    Route::resource('users', 'UserController');
    
    Route::resource('categories', 'CategoryController');

    Route::resource('courses', 'CourseController');

    // Ajax => Select Category in Courses Page
    Route::get('/changeCategory/{Category}','CourseController@changeCategory');
    
    
    Route::get('lessons/create/{course}' , 'LessonController@create')->name('lessons.create');
    Route::post('lessons/{course}' , 'LessonController@store')->name('lessons.store');
    Route::resource('lessons', 'LessonController')->except('index' , 'create' , 'store');
    
    
    Route::delete('reviews/{review}','ReviewController@destroy')->name('reviews.destroy');
    
    Route::resource('courses_enrolls','CourseEnrollController')->only('index', 'destroy' , 'update');
});
