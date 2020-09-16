<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('danh-sach-tai-khoan', 'AccountController@index')->name('account.index');
Route::get('them-tai-khoan-giao-vien', 'AccountController@createTeacher')->name('account.create-teacher');
Route::get('them-tai-khoan-hoc-sinh', 'AccountController@createStudent')->name('account.create-student');