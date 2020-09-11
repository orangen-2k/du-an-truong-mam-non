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

Route::get('/', function () {
    return view('index');
})->middleware('auth', 'web');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'web');

Route::prefix('quang-ly-hoc-sinh')->group(function () {
    Route::get('/','QuanlyHocSinhController@index');
});

Route::resource('quan-ly-tai-khoan', 'AccountController');
Route::resource('quan-ly-giao-vien', 'GiaovienController');