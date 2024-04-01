<?php

namespace App\Http\Controllers\taikhoan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThuKyController extends Controller
{
    public function dashboard()
    {
        return view('thuky.dashboard');
    }
}
