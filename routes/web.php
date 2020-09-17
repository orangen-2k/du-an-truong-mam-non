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
})->middleware('auth', 'web')->name('app');
Auth::routes();
Route::get('profile', 'Auth\AuthController@profile')->middleware('auth', 'web')->name('auth.profile');;
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('quan-ly-giao-vien')->group(function () {
    Route::get('/','QuanlyGiaoVienController@index')->name('quan-ly-giao-vien-index');
    Route::get('/add', 'QuanlyGiaoVienController@add');
});
Route::prefix('quan-ly-hoc-sinh')->group(function () {
    Route::get('/','QuanlyHocSinhController@index')->name('quan-ly-hoc-sinh-index');
    Route::get('/create','QuanlyHocSinhController@create')->name('quan-ly-hoc-sinh-create');
    Route::get('/edit/{id}','QuanlyHocSinhController@edit')->name('quan-ly-hoc-sinh-edit');
    Route::post('/store','QuanlyHocSinhController@store')->name('quan-ly-hoc-sinh-store');
});

Route::prefix('quan-ly-khoi')->group(function () {
    Route::get('/','KhoiController@index')->name('quan-ly-khoi-index');
    Route::post('/post_create', 'KhoiController@post_create')->name('quan-ly-khoi-post_create');
    Route::post('/destroy', 'KhoiController@destroy')->name('quan-ly-khoi-destroy');
    Route::post('/store/{id}','KhoiController@store')->name('quan-ly-khoi-store');
});

Route::prefix('quan-ly-lop')->group(function () {
    Route::get('/','LopController@index')->name('quan-ly-lop-index');
    Route::get('/show/{id}','LopController@show')->name('quan-ly-lop-show');


});
