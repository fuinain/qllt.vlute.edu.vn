<?php

use App\Http\Controllers\taikhoan\AdminController;
use Illuminate\Support\Facades\Route;

//Đăng nhập SSO (single site on)
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/thuky/dashboard', 'ThukyController@dashboard')->name('thuky.dashboard');
Route::get('/giangvien/dashboard', 'GiangvienController@dashboard')->name('giangvien.dashboard');
Route::get('/auth/login/callback', [AdminController::class, 'callback'])->name('auth.callback');



Route::get('/', function () {
    return view('master');
});

Route::get('/', function () {
    return view('master');
})->name('master');

Route::get('/admin', function () {
    return view('admin.master');
})->name('admin');

Route::get('/giangvien', function () {
    return view('giangvien.master');
})->name('giangvien');

Route::get('/thuky', function () {
    return view('thuky.master');
})->name('thuky');

