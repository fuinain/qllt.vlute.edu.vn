<?php

namespace App\Http\Controllers\giangvien;

use App\Http\Controllers\Controller;
use App\Models\admin\GiangVienModel;
use App\Models\admin\HocKyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class DashBoardController extends Controller
{
    public function getViewDashBoard(Request $request)
    {
        $role =  $request->session()->get('Quyen');
        $email =  $request->session()->get('Email');
        if(!$role || $role  != 'giangvien') {
            return redirect('auth/login');
        }
        $giangvien = DB::table('giang_vien')->where('email',$email)->first();
        $hk = new HocKyModel();
        $dataHK = $hk->danhSach();
        return view('giangvien.dashboard', ['hk' => $dataHK, 'id_giang_vien' => $giangvien->id_giang_vien]);
    }
}
