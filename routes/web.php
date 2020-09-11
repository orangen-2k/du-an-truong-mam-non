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
Route::get('dang-ky','Auth\AuthController@viewFormRegister')->name('auth.view-form-register');
Route::post('dang-ky','Auth\AuthController@register')->name('auth.register');
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('quang-ly-hoc-sinh')->group(function () {
    Route::get('/','QuanlyHocSinhController@index');
    Route::post('export-bieu-mau','QuanlyHocSinhController@exportBieuMau')->name('export-bieu-mau-nhap-hoc-sinh');
});