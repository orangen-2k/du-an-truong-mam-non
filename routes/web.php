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
});

Route::get('dang-ky','Auth\AuthController@viewFormRegister')->name('auth.view-form-register');
Route::post('dang-ky','Auth\AuthController@register')->name('auth.register');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
