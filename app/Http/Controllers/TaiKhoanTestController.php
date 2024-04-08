<?php

namespace App\Http\Controllers;
use App\Models\DangNhapModel;
use App\Models\NhatKyModel;
use App\Models\TaiKhoanModel;
use App\Models\ThongKeModel;
use App\Models\ToolsModel;
use App\Traits\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class TaiKhoanController extends Controller
{
    public function getViewDangNhap(){
        return view('auth.login');
    }

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
                    $request->session()->put('IsLogin', true);
                    $request->session()->put('Email', $tttk->email);
                    $request->session()->put('HoTen', $dttk->ho_ten);
                    $request->session()->put('Quyen', $dttk->quyen);

                    $nk->id_tai_khoan=$dttk->id_tai_khoan;
                    $nk->mo_ta="Đăng nhập thành công";
                    $nk->insertNhatKy();

                    if($request->session()->get('Quyen') == 'Admin')
                        return redirect(action2URL('TaiKhoanController@getViewHome'));

                    if($request->session()->get('Quyen') == 'Hiệu trưởng')
                        return redirect(action2URL('HieuTruongController@getViewHome'));
                }
            }

            $nk->mo_ta =$tttk->email .' bị từ chối đăng nhập';
            $nk->insertNhatKy();
            return redirect(action2URL('TaiKhoanController@khongCoQuyen'));
        } catch (\Exception $e) {
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

    public function getViewHome() {
        $tk = new ThongKeModel();
        return view('auth.auth', [
            'tongsv' => $tk->tongSV(),  
            'tonggd' => $tk->tongGD(),
            'bieudo' => $tk->thongKe(),
            'sogd' => $tk->thongKeTiLeGD(),
            'sogdhomnay' => $tk->thongKeTiLeGDHomNay(),
        ]);
    }


    public function getTaiKhoan(Request $r)
    {
        $tk = new TaiKhoanModel();
        return view('auth.tai-khoan.tai-khoan',[
            'data'=>$tk->dsTaiKhoan(),
        ]);
    }

    public function putTaiKhoan(Request $r)
    {
        $tk = new TaiKhoanModel();
        $tk->ho_ten = $r->ho_ten;
        $tk->email = $r->email;
        $tk->quyen = $r->quyen;
        if($tk->insert())
            return ToolsModel::status('Thêm thông tin thành công', 200);
        return ToolsModel::status('Thêm thông tin thất bại', 500);
    }

    public function deleteTaiKhoan(Request $r)
    {
        $tk = new TaiKhoanModel();
        $tk->id_tai_khoan = $r->id_tai_khoan;
        if($tk->delete())
            return ToolsModel::status('Xóa thông tin thành công', 200);
        return ToolsModel::status('Xóa thông tin thất bại', 500);
    }

    public function postTaiKhoan(Request $r)
    {
        $tk = new TaiKhoanModel();
        $tk->id_tai_khoan = $r->input('id_tai_khoan');
        $tk->ho_ten = $r->input('ho_ten');
        $tk->email = $r->input('email');
        $tk->quyen = $r->input('quyen');
        if($tk->capNhat())
            return ToolsModel::status('Cập nhật thông tin thành công', 200);
        return ToolsModel::status('Cập nhật thông tin thất bại', 500);
    }
}

