<?php

use App\Http\Controllers\taikhoan\AdminController;
use Illuminate\Support\Facades\Route;

//Đăng nhập SSO (single site on)
Route::get('/auth/login/callback', 'App\Http\Controllers\TaiKhoanController@callback')->name('auth.callback');
Route::get('/auth/login', 'App\Http\Controllers\TaiKhoanController@dangNhap')->name('auth.login');
Route::get('/auth/logout', 'App\Http\Controllers\TaiKhoanController@dangXuat')->name('auth.logout');


Route::get('/', function () {
    return view('master');
});

Route::get('/', function () {
    return view('master');
})->name('master');
//
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('is.login');

Route::get('/giangvien', function () {
    return view('giangvien.dashboard');
})->name('giangvien.dashboard')->middleware('is.login');

Route::get('/thuky', function () {
    return view('thuky.dashboard');
})->name('thuky.dashboard')->middleware('is.login');
//Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//Route::get('/thuky/dashboard', 'ThukyController@dashboard')->name('thuky.dashboard');
//Route::get('/giangvien/dashboard', 'GiangvienController@dashboard')->name('giangvien.dashboard');
