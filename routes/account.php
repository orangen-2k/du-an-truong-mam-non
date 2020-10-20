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



Route::group(['middleware' => ['auth', 'web']], function () {
    Route::get('danh-sach-tai-khoan-nha-truong', 'AccountController@index')->name('account.index');
    Route::get('danh-sach-tai-khoan-giao-vien', 'AccountController@index')->name('account.ds-gv');
    Route::get('danh-sach-tai-khoan-hoc-sinh', 'AccountController@index')->name('account.ds-hs');
    Route::post('thay-doi-trang-thai', 'AccountController@editStatus')->name('account.editStatus');

    Route::get('them-tai-khoan-giao-vien', 'AccountController@createTeacher')->name('account.create-teacher');
    Route::get('them-tai-khoan-nha-truong', 'AccountController@createSchool')->name('account.create-school');
    Route::post('them-tai-khoan-nha-truong', 'AccountController@storeSchool')->name('account.store-school');
});
