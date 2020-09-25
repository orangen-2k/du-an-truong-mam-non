<?php

use Illuminate\Support\Facades\Auth;
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
    return view('index');
})->middleware('auth', 'web')->name('app');
Auth::routes();
Route::get('profile', 'Auth\AuthController@profile')->middleware('auth', 'web')->name('auth.profile');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/get_quan_huyen_theo_thanh_pho', 'QuanHuyenController@getQuanHuyenByMaTp')->name('get_quan_huyen_theo_thanh_pho');
Route::post('/get_xa_phuong_theo_thanh_pho', 'XaPhuongThiTranController@getXaPhuongThiTranByMaPh')->name('get_xa_phuong_theo_thi_tran');
Route::get('/quang_sac_sua', 'DangKiNhapHocController@basic_email');
Route::post('/get_quan_huyen_theo_thanh_pho', 'QuanHuyenController@getQuanHuyenByMaTp')->name('get_quan_huyen_theo_thanh_pho');
Route::post('/get_xa_phuong_theo_thanh_pho', 'XaPhuongThiTranController@getXaPhuongThiTranByMaPh')->name('get_xa_phuong_theo_thi_tran');

Route::prefix('/dang-ki-nhap-hoc')->group(function () {
    Route::get('/', 'DangKiNhapHocController@index')->name('dangki-nhap-hoc');
    Route::post('/submit-dang-ki-nhap-hoc', 'DangKiNhapHocController@store')->name('submit-dang-ki-nhap-hoc');
    Route::post('/submit-xac-nhan-ma-dang-ky', 'DangKiNhapHocController@XacNhanDangKy')->name('submit-xac-nhan-ma-dangki');
});

Route::prefix('quan-ly-giao-vien')->group(function () {
    Route::get('/', 'QuanlyGiaoVienController@index')->name('quan-ly-giao-vien-index');
    Route::get('/create', 'QuanlyGiaoVienController@create')->name('quan-ly-giao-vien-create');
    Route::post('/store', 'QuanlyGiaoVienController@store')->name('quan-ly-giao-vien-store');
    Route::get('/edit/{lop_id}/{id}', 'QuanlyGiaoVienController@edit')->name('quan-ly-giao-vien-edit');
    Route::post('/update/{id}', 'QuanlyGiaoVienController@update')->name('quan-ly-giao-vien-update');
    Route::post('/lop-theo-khoi', 'QuanlyGiaoVienController@getLopTheoKhoi')->name('quan-ly-giao-vien-get-lop-theo-khoi');
    Route::post('/destroy', 'QuanlyGiaoVienController@destroy')->name('quan-ly-giao-vien-destroy');
});
Route::prefix('quan-ly-hoc-sinh')->group(function () {
    Route::get('/', 'QuanlyHocSinhController@index')->name('quan-ly-hoc-sinh-index');
    Route::get('/create', 'QuanlyHocSinhController@create')->name('quan-ly-hoc-sinh-create');
    Route::get('/edit/{id}', 'QuanlyHocSinhController@edit')->name('quan-ly-hoc-sinh-edit');
    Route::post('/store', 'QuanlyHocSinhController@store')->name('quan-ly-hoc-sinh-store');

    Route::post('export-bieu-mau', 'QuanlyHocSinhController@exportBieuMau')->name('export-bieu-mau-nhap-hoc-sinh');
    Route::post('/get_lop_theo_khoi', 'QuanlyHocSinhController@getLopOfKhoi')->name('get-lop-theo-khoi');

    Route::post('import-bieu-mau-hoc-sinh', 'QuanlyHocSinhController@importFile')->name('import-bieu-mau-nhap-hoc-sinh');
    Route::post('error-import-bieu-mau-hoc-sinh', 'QuanlyHocSinhController@errorFileImport')->name('error-import-bieu-mau-nhap-hoc-sinh');
});

Route::prefix('quan-ly-dang-ky-nhap-hoc-online')->group(function () {
    Route::get('/', 'QuanLyDangKyNhapHocController@index')->name('quan-ly-dang-ky-nhap-hoc.index');
    Route::get('/edit/{id}', 'QuanLyDangKyNhapHocController@show')->name('edit-hs-dang-ky-nhap-hoc');
    Route::post('/edit', 'QuanLyDangKyNhapHocController@PheDuyet')->name('submit-edit-hs-dang-ky-nhap-hoc');
});
// thanhnv 9/16/2020

Route::prefix('quan-ly-khoi')->group(function () {
    Route::get('/', 'KhoiController@index')->name('quan-ly-khoi-index');
    Route::post('/post_create', 'KhoiController@post_create')->name('quan-ly-khoi-post_create');
    Route::post('/destroy', 'KhoiController@destroy')->name('quan-ly-khoi-destroy');
    Route::post('/store/{id}', 'KhoiController@store')->name('quan-ly-khoi-store');
});

Route::prefix('quan-ly-lop')->group(function () {
    Route::get('/', 'LopController@index')->name('quan-ly-lop-index');
    Route::get('/create', 'LopController@create')->name('quan-ly-lop-create');
    Route::get('/show/{id}', 'LopController@show')->name('quan-ly-lop-show');
    Route::get('/phan-lop', 'LopController@phanLop')->name('quan-ly-lop-phan-lop');
    Route::get('/xep-lop', 'LopController@xepLop')->name('quan-ly-lop-xep-lop');
    Route::get('/edit/{id}', 'LopController@edit')->name('quan-ly-lop-edit');
    Route::post('/store', 'LopController@store')->name('quan-ly-lop-phan-store');
    Route::post('/update/{id}', 'LopController@update')->name('quan-ly-lop-update');
    Route::post('/destroy', 'LopController@destroy')->name('quan-ly-lop-destroy');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::prefix('nam-hoc')->group(function () {
        Route::get('/', 'NamHocController@index')->name('nam-hoc.index');
        Route::post('/create', 'NamHocController@store')->name('nam-hoc.store');
    });
});
