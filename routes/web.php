<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function() {
	Route::get('/home', 'HomeController@index')->name('home');
});


//Admin Routes

Route::namespace('Admin')->prefix('admin')->group(function() {
	Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'LoginController@login')->name('admin.login');

	Route::middleware('auth:admin')->group(function() {
		Route::post('logout', 'LoginController@logout')->name('admin.logout');
		Route::get('home', 'HomeController@index')->name('admin.home');

		//For Student
		Route::get('add-student', 'StudentController@student')->name('add-student');
		Route::post('insert-student', 'StudentController@insertStudent');
		Route::get('all-student', 'StudentController@studentlist')->name('all-student');
		Route::get('deletestudent/{id}', 'StudentController@deletestudent');
		Route::get('editstudent/{id}', 'StudentController@editstudent');
		Route::post('update-student/{id}', 'StudentController@updatestudent');

		//For Teacher
		Route::get('add-teacher', 'TeacherController@teacher')->name('add-teacher');
		Route::post('insert-teacher', 'TeacherController@insertTeacher');
		Route::get('all-teacher', 'TeacherController@teacherlist')->name('all-teacher');
		Route::get('deleteteacher/{id}', 'TeacherController@deleteteacher');
	});
});


//Teacher Routes

Route::namespace('Teacher')->prefix('teacher')->group(function() {
	Route::get('login', 'LoginController@showLoginForm')->name('teacher.login');
	Route::post('login', 'LoginController@login')->name('teacher.login');

	/*
	* Password Reset Routes for Teacher
	*/
	Route::get('password/reset', 'Passwords\ForgetPasswordController@showLinkRequestForm')->name('teacher.password.request');
	Route::post('password/email', 'Passwords\ForgetPasswordController@SendResetLinkEmail')->name('teacher.password.email');
	Route::get('password/reset/{token}', 'Passwords\ResetPasswordController@showResetForm')->name('teacher.password.reset');
	Route::post('password/reset', 'Passwords\ResetPasswordController@reset')->name('teacher.password.update');


	Route::middleware('auth:teacher')->group(function() {
		Route::get('home', 'HomeController@index')->name('teacher.home');
		Route::post('logout', 'LoginController@logout')->name('teacher.logout');
	});
});