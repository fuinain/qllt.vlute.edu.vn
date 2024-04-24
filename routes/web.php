<?php

use App\Http\Controllers\taikhoan\AdminController;
use Illuminate\Support\Facades\Route;

//Đăng nhập SSO (single site on)
Route::get('/', 'App\Http\Controllers\TaiKhoanController@dangNhap')->name('auth.login');


Route::get('/auth/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('is.login');

Route::get('/auth/giangvien', function () {
    return view('giangvien.dashboard');
})->name('giangvien.dashboard')->middleware('is.login');

Route::get('/auth/thuky', function () {
    return view('thuky.dashboard');
})->name('thuky.dashboard')->middleware('is.login');

Route::group(['prefix' => '/auth'], function (){
    Route::get('/login/callback', 'App\Http\Controllers\TaiKhoanController@callback')->name('auth.callback');
    Route::get('/login', 'App\Http\Controllers\TaiKhoanController@dangNhap')->name('auth.login');

    //Chức năng Admin
    Route::get('/admin/', 'App\Http\Controllers\admin\DashBoardController@getViewDashBoard');
    Route::post('/admin/sync', 'App\Http\Controllers\admin\DashBoardController@syncTKBGiangVien');
    Route::get('/admin/search', 'App\Http\Controllers\admin\GiangVienController@searchGiangVien');


    //QL giảng viên
    Route::get('/admin/quanlygiangvien/', 'App\Http\Controllers\admin\GiangVienController@getViewDanhSach');
    Route::get('/admin/quanlygiangvien/danhsach', 'App\Http\Controllers\admin\GiangVienController@getViewDanhSach');

    //Thêm
    Route::get('/admin/quanlygiangvien/them', 'App\Http\Controllers\admin\GiangVienController@getViewThem');
    Route::put('/admin/quanlygiangvien/them', 'App\Http\Controllers\admin\GiangVienController@putGiangVien');
    Route::post('/admin/quanlygiangvien/them', 'App\Http\Controllers\admin\GiangVienController@postImportGiangVien');

    //Cập nhật
    Route::get('/admin/quanlygiangvien/cap-nhat/{id_giang_vien}', 'App\Http\Controllers\admin\GiangVienController@getViewCapNhat');
    Route::post('/admin/quanlygiangvien/cap-nhat', 'App\Http\Controllers\admin\GiangVienController@postGiangVien');

    //Xoá
    Route::delete('/admin/quanlygiangvien/xoa', 'App\Http\Controllers\admin\GiangVienController@deleteGiangVien');

    //QL Học kỳ
    Route::get('/admin/quanlyhocky/danhsach', 'App\Http\Controllers\admin\HocKyController@getViewDanhSach');
    Route::post('/admin/quanlyhocky/danhsach/sync', 'App\Http\Controllers\admin\HocKyController@syncHocKy');

    //QL Biễu mẫu
    Route::get('/admin/quanlybieumau', 'App\Http\Controllers\admin\BieuMauController@getViewDanhSach');
    Route::post('/admin/quanlybieumau/upload-excel', 'App\Http\Controllers\admin\BieuMauController@uploadExcel');
    Route::delete('/admin/quanlybieumau/delete-excel','App\Http\Controllers\admin\BieuMauController@deleteFile');

    //Chức năng Thư ký
    Route::get('/thuky/', 'App\Http\Controllers\thuky\DashBoardController@getViewDashBoard');
    Route::post('/thuky/sync', 'App\Http\Controllers\thuky\DashBoardController@syncTKBGiangVien');
    Route::get('/thuky/search', 'App\Http\Controllers\thuky\GiangVienController@searchGiangVien');

    //QL Biễu mẫu
    Route::get('/thuky/quanlybieumau', 'App\Http\Controllers\thuky\BieuMauController@getViewDanhSach');
    Route::post('/thuky/quanlybieumau/upload-excel', 'App\Http\Controllers\thuky\BieuMauController@uploadExcel');
    Route::delete('/thuky/quanlybieumau/delete-excel','App\Http\Controllers\thuky\BieuMauController@deleteFile');

});
//'middleware' => 'is.login'

