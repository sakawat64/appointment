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

Route::get('/','AppointmentController@index');
Route::get('/district/{id}','AppointmentController@Getdistrict');
Route::get('/doctor','AppointmentController@doctorlistall');
Route::post('/doctor','AppointmentController@doctorlist');
Route::post('/appointment','AppointmentController@appointment');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
