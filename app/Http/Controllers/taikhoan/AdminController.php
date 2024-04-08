<?php

namespace App\Http\Controllers\taikhoan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AdminController extends Controller
{
    public function dashboard()
    {
        return Socialite::driver('keycloak')->redirect();

    }
    public function callback()
    {
        return view('admin.dashboard');
    }

}
