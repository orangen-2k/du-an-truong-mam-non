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

    Route::get('/get-giao-vien-chua-co-lop', 'QuanlyGiaoVienController@getGiaoVienChuaCoLop')->name('quan-ly-giao-vien-chua-co-lop');
});
Route::prefix('quan-ly-hoc-sinh')->group(function () {
    Route::get('/thong-tin/{id}', 'QuanlyHocSinhController@index')->name('quan-ly-hoc-sinh-index');
    Route::get('/create', 'QuanlyHocSinhController@create')->name('quan-ly-hoc-sinh-create');
    Route::get('/edit/{id}', 'QuanlyHocSinhController@edit')->name('quan-ly-hoc-sinh-edit');
    Route::post('/update/{id}', 'QuanlyHocSinhController@update')->name('quan-ly-hoc-sinh-update');
    Route::post('/store', 'QuanlyHocSinhController@store')->name('quan-ly-hoc-sinh-store');

    Route::post('export-bieu-mau', 'QuanlyHocSinhController@exportBieuMau')->name('export-bieu-mau-nhap-hoc-sinh');
    Route::post('/get_lop_theo_khoi', 'QuanlyHocSinhController@getLopOfKhoi')->name('get-lop-theo-khoi');

    Route::post('import-bieu-mau-hoc-sinh', 'QuanlyHocSinhController@importFile')->name('import-bieu-mau-nhap-hoc-sinh');
    Route::post('error-import-bieu-mau-hoc-sinh', 'QuanlyHocSinhController@errorFileImport')->name('error-import-bieu-mau-nhap-hoc-sinh');

    //v2
    Route::post('/hoc-sinh-chua-co-lop', 'QuanlyHocSinhController@showHocSinhChuaCoLop')->name('quan-ly-hoc-sinh-chua-co-lop');
    Route::post('/chuyen-lop', 'QuanlyHocSinhController@chuyenLop')->name('quan-ly-hoc-sinh-chuyen-lop');
    Route::post('/thoi-hoc', 'QuanlyHocSinhController@thoiHoc')->name('quan-ly-hoc-sinh-thoi-hoc');
    Route::post('/get-thong-tin-hoc-sinh-thoi-hoc', 'QuanlyHocSinhController@getThongTinThoiHoc')->name('get-thong-tin-hoc-sinh-thoi-hoc');  
    Route::post('/xac-nhan-hoc-sinh-di-hoc-lai', 'QuanlyHocSinhController@xacNhanDiHocLai')->name('xac-nhan-hoc-sinh-di-hoc-lai');
    
    

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
    Route::post('/show', 'KhoiController@show')->name('quan-ly-khoi-show');
    Route::post('/update', 'KhoiController@update')->name('quan-ly-khoi-update');
});

Route::prefix('quan-ly-lop')->group(function () {
    Route::get('/', 'LopController@index')->name('quan-ly-lop-index');
    Route::get('/create', 'LopController@create')->name('quan-ly-lop-create');
    Route::get('/show/{id}', 'LopController@show')->name('quan-ly-lop-show');
    Route::get('/phan-lop', 'LopController@phanLop')->name('quan-ly-lop-phan-lop');
    Route::get('/xep-lop', 'LopController@xepLop')->name('quan-ly-lop-xep-lop');

    //Lớp v2

    Route::post('/edit', 'LopController@edit')->name('quan-ly-lop-edit');
    Route::post('/store', 'LopController@store')->name('quan-ly-lop-phan-store');
    Route::post('/update', 'LopController@update')->name('quan-ly-lop-update');
    Route::post('/destroy', 'LopController@destroy')->name('quan-ly-lop-destroy');

    Route::post('/show-data-hoc-sinh-theo-lop', 'LopController@showHsTheoLop')->name('quan-ly-lop-show-data-hoc-sinh');
    Route::get('/show-data-hoc-sinh-chua-co-lop/{type}', 'LopController@getDataHocSinhChuaCoLop')->name('quan-ly-lop-show-data-hoc-sinh-type');

    Route::post('/xep-lop-tu-dong', 'LopController@xepLopTuDong')->name('quan-ly-lop-xep-lop-tu-dong');

});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::prefix('nam-hoc')->group(function () {
        Route::get('/', 'NamHocController@index')->name('nam-hoc.index');
        Route::post('/create', 'NamHocController@store')->name('nam-hoc.store');
        Route::get('/chi-tiet-nam-hoc/{id}', 'QuanLyTrongNamController@index')->name('nam-hoc-chi-tiet');
        Route::post('/dong-nam-hoc', 'NamHocController@lock')->name('nam-hoc.lock');
        Route::get('/chuyen-du-lieu-nam-hoc/{id}', 'QuanLyTrongNamController@getchuyenDuLieuNamHoc')->name('get-chuyen-du-lieu-nam-hoc');
        Route::post('/chuyen-du-lieu-nam-hoc', 'QuanLyTrongNamController@postchuyenDuLieuNamHoc')->name('post-chuyen-du-lieu-nam-hoc');
        Route::post('/get-du-lieu-khoi-lop-nam-moi', 'QuanLyTrongNamController@getDuLieuKhoiLopNamMoi')->name('get-du-lieu-khoi-lop-nam-moi');
        Route::get('/get-du-lieu-len-lop/{id}', 'QuanLyTrongNamController@duLieuLenLop')->name('get-du-lieu-len_lop');
        Route::post('/len-lop-cho-hoc-sinh', 'QuanLyTrongNamController@leLopChoHocSinh')->name('len-lop-cho-hoc-sinh');
        Route::get('/du-lieu-nam-hoc-moi-len-lop', 'QuanLyTrongNamController@getDuLieuNamHocMoiLenLop')->name('du-lieu-nam-hoc-moi-len-lop');
        Route::get('/get_hoc_sinh_tot_nghiep_theo_nam/{id}', 'QuanLyTrongNamController@hocSinhTotNghiepTheoNam')->name('hoc_sinh_tot_nghiep_theo_nam');
        Route::post('/kiem_tra_ton_tai_thong_tin_nam_hoc', 'QuanLyTrongNamController@kiemTraTonTaiDuLieuNamHoc')->name('kiem_tra_ton_tai_thong_tin_nam_hoc');
        Route::post('/xoa_toan_bo_du_lieu_nam_hoc_hien_tai', 'QuanLyTrongNamController@xoaToanBoDuLieuCuaNamHocHienTai')->name('xoa_toan_bo_du_lieu_nam_hoc_hien_tai');
        
        
    });
    Route::prefix('thong-bao')->group(function () {
        Route::get('/', 'ThongBaoController@index')->name('thong-bao.index');
        Route::get('/toan-truong', 'ThongBaoController@uiThongBaoToanTruong')->name('thong-bao.ui-tt');
        Route::get('/giao-vien', 'ThongBaoController@uiThongBaoGiaoVien')->name('thong-bao.ui-gv');
        Route::get('/hoc-sinh', 'ThongBaoController@uiThongBaoHocSinh')->name('thong-bao.ui-hs');
        Route::get('/{id}', 'ThongBaoController@showThongBao')->name('thong-bao.show')->where('id', '[0-9]+');;

        Route::post('sendto', 'ThongBaoController@store')->name('sendto');
        Route::post('sendto-toan-truong', 'ThongBaoController@postToanTruong')->name('sendto_toantruong');
    });

    Route::post('changeType', 'NotificationController@changeType')->name('notification.changeType');

});

Route::prefix('quan-ly-diem-danh-den')->group(function () {
    Route::get('/{id}', 'QuanlyDiemDanhDenController@index')->name('quan-ly-diem-danh-den-index');
    Route::post('/lay-theo-lop', 'QuanlyDiemDanhDenController@getDiemDanhDen')->name('quan-ly-diem-danh-den-theo-lop');
    Route::post('/thong-ke-diem-danh', 'QuanlyDiemDanhDenController@ThongKeDiemDanh')->name('quan-ly-thong-ke-diem-danh');
});
