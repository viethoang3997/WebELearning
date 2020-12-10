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

Route::get('/index', 'HomeController@index')->name('index');
Route::resource('course', 'CourseController');
Route::resource('review', 'ReviewController');
// Route::get('review/{id}/edit', 'ReviewController@edit')->name('review.edit');
Route::put('review/{id}', 'ReviewController@update')->name('review.update');
Route::get('/search-course', 'CourseController@getSearch')->name('course.search');
Route::get('/search-lesson/{id}', 'LessonController@getSearchLesson')->name('lesson.search');
Route::resource('lesson', 'LessonController');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'teacher'], function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::resource('courses', 'CourseAdminController');
    Route::get('/search-course', 'CourseAdminController@search')->name('course.search');
    Route::resource('users', 'UserAdminController');
    Route::get('/search-user', 'UserAdminController@search')->name('user.search');
});
Route::post('join-course/{id}', "CourseController@joinCourse")->name('join.course');
Route::post('leave-course/{id}', "CourseController@leaveCourse")->name('leave.course');
Route::post('join-lesson/{id}', "LessonController@joinLesson")->name('join.lesson');
Route::get('/profile/{id}', 'ProfileController@show')->name('profile.show');
Route::post('/update-profile/{id}', 'ProfileController@update')->name('profile.update');
Route::post('/update-avatar/{id}', 'ProfileController@uploadAvatar')->name('profile.avatar');
