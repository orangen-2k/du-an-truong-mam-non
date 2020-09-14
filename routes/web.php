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
    Route::get('/hi','QuanlyHocSinhController@show');
    Route::post('export-bieu-mau','QuanlyHocSinhController@exportBieuMau')->name('export-bieu-mau-nhap-hoc-sinh');
    Route::post('/get_lop_theo_khoi','QuanlyHocSinhController@getLopOfKhoi')->name('get-lop-theo-khoi');

    Route::post('import-bieu-mau-hoc-sinh','QuanlyHocSinhController@importFile')->name('import-bieu-mau-nhap-hoc-sinh');
    Route::post('error-import-bieu-mau-hoc-sinh','QuanlyHocSinhController@errorFileImport')->name('error-import-bieu-mau-nhap-hoc-sinh');

});