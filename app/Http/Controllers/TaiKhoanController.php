<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            $nk = new NhatKyModel();

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

                    $nk->id_tai_khoan = $dttk->id_tai_khoan;
                    $nk->mo_ta = "Đăng nhập thành công";
                    $nk->insertNhatKy();

                    // Điều hướng đến trang tương ứng với quyền
                    if($request->session()->get('Quyen') == 'admin')
                        return redirect()->route('admin.dashboard');

                    if($request->session()->get('Quyen') == 'thuky')
                        return redirect()->route('thuky.dashboard');

                    if($request->session()->get('Quyen') == 'giangvien')
                        return redirect()->route('giangvien.dashboard');
                }
            }

            // Ghi nhật ký khi xác thực không thành công
            $nk->mo_ta = $tttk->email .' bị từ chối đăng nhập';
            $nk->insertNhatKy();

            // Điều hướng đến trang thông báo khi không có quyền truy cập
            return redirect()->route('auth.khongCoQuyen');
        } catch (\Exception $e) {
            // Xử lý ngoại lệ
            return redirect('/');
        }
    }

    public function dangXuat(){
        session()->invalidate();
        $redirect = ToolsModel::action2URL('TaiKhoanController@dangNhap');
        return redirect(env('KEYCLOAK_BASE_URL') . "realms/master/protocol/openid-connect/logout?redirect_uri=$redirect");
    }

    public function thayDoiMatKhau(){
        $KEYCLOAK_BASE_URL = env('KEYCLOAK_BASE_URL');
        $REALM = env('KEYCLOAK_REALM');
        return redirect($KEYCLOAK_BASE_URL . "realms/" . $REALM . "/account/#/security/signingin");
    }

    public function dangNhap() {
        return Socialite::driver('keycloak')->redirect();
    }

    public function khongCoQuyen() {
        return view('auth.thong-bao.deny-access');
    }
}
