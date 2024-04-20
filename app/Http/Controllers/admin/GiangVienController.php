<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\GiangVienModel;
use Illuminate\Http\Request;

class GiangVienController extends Controller
{
    public function getViewDanhSach()
    {
        return view('admin.quanlygiangvien.danh-sach');
    }

    public function getViewThem()
    {
        return view('admin.quanlygiangvien.them');
    }

    public function getViewCapNhat()
    {
        return view('admin.quanlygiangvien.cap-nhat');
    }

    public function getViewXoa()
    {
        return view('admin.quanlygiangvien.xoa');
    }

    public function putGiangVien(Request $request)
    {
        $gv = new GiangVienModel();
        $gv->id_giang_vien = $request->idGV;
        $gv->ho_ten  = $request->hoTen;
        $gv->hoc_vi = $request->hocVi;
        $gv->email = $request->email;
        $gv->cccd = $request->cccd;
        $gv->ngay_sinh = $request->ngaySinh;
        $gv->so_dien_thoai = $request->soDienThoai;
        $gv->id_don_vi = $request->donVi;
        $gv->quyen = $request->quyen;

        return $gv->them();

    }
}
