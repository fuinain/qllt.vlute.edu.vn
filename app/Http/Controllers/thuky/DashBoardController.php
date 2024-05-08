<?php

namespace App\Http\Controllers\thuky;

use App\Http\Controllers\Controller;
use App\Models\admin\DashBoardModel;
use App\Models\admin\GiangVienModel;
use App\Models\admin\HocKyModel;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    protected $dataHK;
    public function  __construct()
    {
        $hk = new HocKyModel();
        $this->dataHK = $hk->danhSach();
    }
    public function getViewDashBoard(Request $request)
    {
        $role =  $request->session()->get('Quyen');
        if(!$role || $role  != 'thuky') {
            return redirect('auth/login');
        }
        $gv = new GiangVienModel();
        $dataGV = $gv->danhSach();

        return view('thuky.dashboard', ['hk' => $this->dataHK], ['gv' => $dataGV]);
    }

    public function syncTKBGiangVien(Request $request)
    {
        try {
            $cr = new DashBoardModel();
            $cr->magv = $request->id_giang_vien;
            $cr->hocky = $request->id_hoc_ky;
            $cr->themCrawlField();
            // Đường dẫn đến trình thông dịch Python
            $pythonPath = 'C:\Users\ADMIN\AppData\Local\Programs\Python\Python312\python.exe';

            // Đường dẫn đến file Python
            $pythonScriptPath = base_path('crawl_data_from_vlute_ems/crawl_tkb_gv.py');

            // Thực thi script Python
            $output = null;
            $return_var = null;
            exec('"'.$pythonPath.'" "'.$pythonScriptPath.'" 2>&1', $output, $return_var);


            $dataTKB = new DashBoardModel();
            $dataTKB->id_giang_vien = $request->id_giang_vien;
            $dataTKB->id_hoc_ky = $request->id_hoc_ky;
            $data = $dataTKB->danhsachTKBGiangVien();
            return response()->json(['data' => $data, 'status' => 200],200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Chỉnh sửa thất bại', 'status' => 500],500);
        }
    }
}
