<?php

namespace App\Http\Controllers\taikhoan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
