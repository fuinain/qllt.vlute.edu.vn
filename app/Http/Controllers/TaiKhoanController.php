<?php

namespace App\Http\Controllers;

use App\Models\taikhoan\DangNhapModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class TaiKhoanController extends Controller
{
    public function callback(Request $request)
    {
        try {
            $user = Socialite::driver('keycloak')->stateless()->user();
            $token = $user->token;
            $tokenParts = explode(".", $token);
            $tokenPayload = base64_decode($tokenParts[1]);
            $tttk = json_decode($tokenPayload);

            if(isset($tttk->email)){
                $tk = new DangNhapModel();
                $tk->email = $tttk->email;
                $dttk = $tk->dangNhap();

                if($dttk) {
                    // Lưu thông tin người dùng vào session
                    $request->session()->put('IsLogin', true);
                    $request->session()->put('Email', $tttk->email);
                    $request->session()->put('HoTen', $dttk->ho_ten);
                    $request->session()->put('Quyen', $dttk->quyen);

                    // Điều hướng đến trang tương ứng với quyền
                    if($request->session()->get('Quyen') == 'admin')
                        return redirect(action('App\Http\Controllers\admin\DashBoardController@getViewDashBoard'));

                    if($request->session()->get('Quyen') == 'thuky')
                        return redirect(action('App\Http\Controllers\thuky\DashBoardController@getViewDashBoard'));

                    if($request->session()->get('Quyen') == 'giangvien')
                        return redirect(action('App\Http\Controllers\giangvien\DashBoardController@getViewDashBoard'));
                }
            }
        } catch (\Exception $e) {
            // Xử lý ngoại lệ và ghi log lỗi nếu cần
            return redirect('/');
        }
    }

    public function dangNhap() {
        return Socialite::driver('keycloak')->redirect();
    }

    public function dangXuat(){
        session()->invalidate();
        return redirect(env('KEYCLOAK_BASE_URL') . "realms/master/protocol/openid-connect/logout?");
    }

    public function khongCoQuyen() {
        return view('auth.thong-bao.deny-access');
    }
}
