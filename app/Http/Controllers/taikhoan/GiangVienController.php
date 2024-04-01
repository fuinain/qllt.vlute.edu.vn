<?php

namespace App\Http\Controllers\taikhoan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GiangVienController extends Controller
{
    public function dashboard()
    {
        return view('giangvien.dashboard');
    }
}
