<?php

use Illuminate\Support\Facades\Route;

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

