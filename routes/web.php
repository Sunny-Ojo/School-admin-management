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
Route::resource('teachersadmin', 'TeachersadminController');

Auth::routes();
Route::get('/blockstudent/{id}', 'BlockController@blockedStudent');
Route::get('/blockteacher/{id}', 'BlockController@blockedTeacher');
Route::get('/unblockstudent/{id}', 'BlockController@unblockedStudent');
Route::get('/unblockteacher/{id}', 'BlockController@unblockedTeacher');
Route::resource('students', 'StudentsController');
Route::resource('teachers', 'TeachersController');
Route::get('/teacherslogin', 'AdminController@teacherslogin');
Route::post('/loginteacher', 'AdminController@loginteacher')->name('loginteacher');