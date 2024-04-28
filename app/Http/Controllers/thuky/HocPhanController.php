<?php

namespace App\Http\Controllers\thuky;

use App\Http\Controllers\Controller;
use App\Models\admin\HocPhanModel;
use Illuminate\Http\Request;

class HocPhanController extends Controller
{
    public function getViewDanhSach()
    {
        $hp = new HocPhanModel();
        $data = $hp->danhSach();
        return view('thuky.quanlyhocphan.danh-sach',['dshp' => $data]);
    }

    public function getViewThem()
    {
        return view('thuky.quanlyhocphan.them');
    }

    public function putHocPhan(Request $request)
    {
        try {
            $hp = new HocPhanModel();
            $hp->ma_hoc_phan = $request->maHP;
            $hp->ten_hoc_phan = $request->tenHP;
            $hp->so_tin_chi = $request->soTC;
            $hp->tin_chi_ly_thuyet = $request->TCLT;
            $hp->tin_chi_thuc_hanh = $request->TCTH;
            $hp->them();
            return response()->json(['message' => 'Thêm thành công', 'status' => 200],200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Thêm thất bại', 'status' => 500],500);
        }

    }
    public function getViewCapNhat($id_hoc_phan, Request $request)
    {
        $hp = new HocPhanModel();
        $hp->id_hoc_phan = $id_hoc_phan;
        return view('thuky.quanlyhocphan.cap-nhat',['ct' => $hp->chiTiet()]);
    }

    public function postHocPhan(Request $request)
    {
        try {
            $hp = new HocPhanModel();
            $hp->id_hoc_phan = $request->id_hoc_phan;
            $hp->ma_hoc_phan = $request->maHP;
            $hp->ten_hoc_phan = $request->tenHP;
            $hp->so_tin_chi = $request->soTC;
            $hp->tin_chi_ly_thuyet = $request->TCLT;
            $hp->tin_chi_thuc_hanh = $request->TCTH;
            $hp->capNhat();

            return response()->json(['message' => 'Chỉnh sửa thành công', 'status' => 200],200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Chỉnh sửa thất bại', 'status' => 500],500);
        }

    }

    public function deleteHocPhan(Request $request)
    {
        try {
            $hp = new HocPhanModel();
            $hp->id_hoc_phan = $request->id_hoc_phan;
            $hp->xoa();
            return response()->json(['message' => 'Xoá thành công', 'status' => 200],200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Xoá thất bại', 'status' => 500],500);
        }
    }
}
