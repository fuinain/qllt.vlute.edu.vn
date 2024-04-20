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

Route::group(['prefix' => '/auth', 'middleware' => 'is.login'], function (){
    Route::get('/login/callback', 'App\Http\Controllers\TaiKhoanController@callback')->name('auth.callback');
    Route::get('/login', 'App\Http\Controllers\TaiKhoanController@dangNhap')->name('auth.login');

    //Chức năng Admin
    //QL giảng viên
    Route::get('/admin/quanlygiangvien/', 'App\Http\Controllers\admin\GiangVienController@getViewDanhSach');
    Route::get('/admin/quanlygiangvien/danhsach', 'App\Http\Controllers\admin\GiangVienController@getViewDanhSach');
    //Thêm
    Route::get('/admin/quanlygiangvien/them', 'App\Http\Controllers\admin\GiangVienController@getViewThem');
    Route::put('/admin/quanlygiangvien/them', 'App\Http\Controllers\admin\GiangVienController@putGiangVien');
    Route::get('/admin/quanlygiangvien/them', 'App\Http\Controllers\admin\DonViController@getDanhSach');

    Route::get('/admin/quanlygiangvien/cap-nhat', 'App\Http\Controllers\admin\GiangVienController@getViewcap-nhat');
    Route::get('/admin/quanlygiangvien/xoa', 'App\Http\Controllers\admin\GiangVienController@getViewxoa');



});


