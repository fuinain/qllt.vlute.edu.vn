<?php

use App\Http\Controllers\taikhoan\AdminController;
use Illuminate\Support\Facades\Route;

//Đăng nhập SSO (single site on)
Route::get('/', 'App\Http\Controllers\TaiKhoanController@dangNhap')->name('auth.login');
Route::get('/auth/login', 'App\Http\Controllers\TaiKhoanController@dangNhap')->name('auth.login');
Route::get('/auth/logout', 'App\Http\Controllers\TaiKhoanController@dangxuat');
Route::get('/auth/login/callback', 'App\Http\Controllers\TaiKhoanController@callback')->name('auth.callback');

Route::group(['prefix' => '/auth', 'middleware' => 'is.login'], function (){
    //Chức năng Admin---------------------------------------------------------------------------------------------------
    Route::get('/admin/', 'App\Http\Controllers\admin\DashBoardController@getViewDashBoard');
    Route::post('/admin/sync', 'App\Http\Controllers\admin\DashBoardController@syncTKBGiangVien');
    Route::get('/admin/search', 'App\Http\Controllers\admin\GiangVienController@searchGiangVien');

    //QL giảng viên
    Route::get('/admin/quanlygiangvien/', 'App\Http\Controllers\admin\GiangVienController@getViewDanhSach');
    Route::get('/admin/quanlygiangvien/danhsach', 'App\Http\Controllers\admin\GiangVienController@getViewDanhSach');

    //Thêm giảng viên
    Route::get('/admin/quanlygiangvien/them', 'App\Http\Controllers\admin\GiangVienController@getViewThem');
    Route::put('/admin/quanlygiangvien/them', 'App\Http\Controllers\admin\GiangVienController@putGiangVien');
    Route::post('/admin/quanlygiangvien/them', 'App\Http\Controllers\admin\GiangVienController@postImportGiangVien');

    //Cập nhật giảng viên
    Route::get('/admin/quanlygiangvien/cap-nhat/{id_giang_vien}', 'App\Http\Controllers\admin\GiangVienController@getViewCapNhat');
    Route::post('/admin/quanlygiangvien/cap-nhat', 'App\Http\Controllers\admin\GiangVienController@postGiangVien');

    //Xoá giảng viên
    Route::delete('/admin/quanlygiangvien/xoa', 'App\Http\Controllers\admin\GiangVienController@deleteGiangVien');

    //QL Học kỳ
    Route::get('/admin/quanlyhocky/danhsach', 'App\Http\Controllers\admin\HocKyController@getViewDanhSach');
    Route::post('/admin/quanlyhocky/danhsach/sync', 'App\Http\Controllers\admin\HocKyController@syncHocKy');

    //QL Học phần
    Route::get('/admin/quanlyhocphan/danhsach', 'App\Http\Controllers\admin\HocPhanController@getViewDanhSach');

    //Thêm học phần
    Route::get('/admin/quanlyhocphan/them', 'App\Http\Controllers\admin\HocPhanController@getViewThem');
    Route::put('/admin/quanlyhocphan/them', 'App\Http\Controllers\admin\HocPhanController@putHocPhan');

    //Cập nhật học phần
    Route::get('/admin/quanlyhocphan/cap-nhat/{id_hoc_phan}', 'App\Http\Controllers\admin\HocPhanController@getViewCapNhat');
    Route::post('/admin/quanlyhocphan/cap-nhat', 'App\Http\Controllers\admin\HocPhanController@postHocPhan');

    //Xoá học phần
    Route::delete('/admin/quanlyhocphan/xoa', 'App\Http\Controllers\admin\HocPhanController@deleteHocPhan');

    //Chức năng Thư ký--------------------------------------------------------------------------------------------------
    Route::get('/thuky/', 'App\Http\Controllers\thuky\DashBoardController@getViewDashBoard');
    Route::post('/thuky/sync', 'App\Http\Controllers\thuky\DashBoardController@syncTKBGiangVien');
    Route::get('/thuky/search', 'App\Http\Controllers\thuky\GiangVienController@searchGiangVien');

    //QL giảng viên
    Route::get('/thuky/quanlygiangvien/', 'App\Http\Controllers\thuky\GiangVienController@getViewDanhSach');
    Route::get('/thuky/quanlygiangvien/danhsach', 'App\Http\Controllers\thuky\GiangVienController@getViewDanhSach');

    //Thêm giảng viên
    Route::get('/thuky/quanlygiangvien/them', 'App\Http\Controllers\thuky\GiangVienController@getViewThem');
    Route::put('/thuky/quanlygiangvien/them', 'App\Http\Controllers\thuky\GiangVienController@putGiangVien');
    Route::post('/thuky/quanlygiangvien/them', 'App\Http\Controllers\thuky\GiangVienController@postImportGiangVien');

    //Cập nhật giảng viên
    Route::get('/thuky/quanlygiangvien/cap-nhat/{id_giang_vien}', 'App\Http\Controllers\thuky\GiangVienController@getViewCapNhat');
    Route::post('/thuky/quanlygiangvien/cap-nhat', 'App\Http\Controllers\thuky\GiangVienController@postGiangVien');

    //Xoá giảng viên
    Route::delete('/thuky/quanlygiangvien/xoa', 'App\Http\Controllers\thuky\GiangVienController@deleteGiangVien');

    //QL Học kỳ
    Route::get('/thuky/quanlyhocky/danhsach', 'App\Http\Controllers\thuky\HocKyController@getViewDanhSach');
    Route::post('/thuky/quanlyhocky/danhsach/sync', 'App\Http\Controllers\thuky\HocKyController@syncHocKy');

    //QL Học phần
    Route::get('/thuky/quanlyhocphan/danhsach', 'App\Http\Controllers\thuky\HocPhanController@getViewDanhSach');

    //Thêm học phần
    Route::get('/thuky/quanlyhocphan/them', 'App\Http\Controllers\thuky\HocPhanController@getViewThem');
    Route::put('/thuky/quanlyhocphan/them', 'App\Http\Controllers\thuky\HocPhanController@putHocPhan');

    //Cập nhật học phần
    Route::get('/thuky/quanlyhocphan/cap-nhat/{id_hoc_phan}', 'App\Http\Controllers\thuky\HocPhanController@getViewCapNhat');
    Route::post('/thuky/quanlyhocphan/cap-nhat', 'App\Http\Controllers\thuky\HocPhanController@postHocPhan');

    //Xoá học phần
    Route::delete('/thuky/quanlyhocphan/xoa', 'App\Http\Controllers\thuky\HocPhanController@deleteHocPhan');

    //Chức năng Giảng viên----------------------------------------------------------------------------------------------
    Route::get('/giangvien/', 'App\Http\Controllers\giangvien\DashBoardController@getViewDashBoard');


    Route::get('/giangvien/quanlyhocphan/chitiet/{ma_hoc_phan}', 'App\Http\Controllers\giangvien\HocPhanController@getViewChiTiet')->name('giangvien.quanlyhocphan.chitiet.view');

    Route::post('/giangvien/quanlyhocphan/chitietlythuyet', 'App\Http\Controllers\giangvien\HocPhanController@postChiTietLyThuyet')->name('giangvien.quanlyhocphan.chitietlt');
    Route::get('/giangvien/quanlyhocphan/export/{ma_hoc_phan}', 'App\Http\Controllers\giangvien\HocPhanController@exportFromTemplate')->name('giangvien.quanlyhocphan.chitiet.export');
    Route::post('/giangvien/quanlyhocphan/import', 'App\Http\Controllers\giangvien\HocPhanController@importFromTemplate')->name('giangvien.quanlyhocphan.chitiet.import');

    Route::post('/giangvien/quanlyhocphan/chitietthuchanh', 'App\Http\Controllers\giangvien\HocPhanController@postChiTietThucHanh')->name('giangvien.quanlyhocphan.chitietth');
    Route::get('/giangvien/quanlyhocphan/export-th/{ma_hoc_phan}', 'App\Http\Controllers\giangvien\HocPhanController@exportFromTemplateTH')->name('giangvien.quanlyhocphan.chitiet.export-th');
    Route::post('/giangvien/quanlyhocphan/import-th', 'App\Http\Controllers\giangvien\HocPhanController@importFromTemplateTH')->name('giangvien.quanlyhocphan.chitiet.import-th');



});

