<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\DonViModel;
use App\Models\admin\GiangVienModel;
use App\Models\SpreadsheetModel;
use App\Models\ToolsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiangVienController extends Controller
{
    public function getViewDanhSach()
    {
        $gv = new GiangVienModel();
        $data = $gv->danhSach();
        return view('admin.quanlygiangvien.danh-sach',['dsgv' => $data]);
    }

    public function getViewThem()
    {
        $model = new DonViModel();
        $dv = $model->danhSach();
        return view('admin.quanlygiangvien.them',['dv' => $dv]);
    }

    public function getViewCapNhat($id_giang_vien, Request $request)
    {
        $gv = new GiangVienModel();
        $gv->id_giang_vien = $id_giang_vien;
        $model = new DonViModel();
        $dv = $model->danhSach();
        return view('admin.quanlygiangvien.cap-nhat',['ct' => $gv->chiTiet()], ['dv' => $dv]);
    }

    public function getViewXoa()
    {
        return view('admin.quanlygiangvien.xoa');
    }

    public function putGiangVien(Request $request)
    {
        try {
            $gv = new GiangVienModel();
            $gv->id_giang_vien = $request->idGV;
            $gv->ho_ten = $request->hoTen;
            $gv->hoc_vi = $request->hocVi;
            $gv->email = $request->email;
            $gv->cccd = $request->cccd;
            $gv->ngay_sinh = $request->ngaySinh;
            $gv->so_dien_thoai = $request->soDienThoai;
            $gv->id_don_vi = $request->donVi;
            $gv->quyen = $request->quyen;
            $gv->them();

            return response()->json(['message' => 'Thêm thành công', 'status' => 200],200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Thêm thất bại', 'status' => 500],500);
        }

    }

    public function postGiangVien(Request $request)
    {
        try {
            $gv = new GiangVienModel();
            $gv->id_giang_vien = $request->idGV;
            $gv->ho_ten = $request->hoTen;
            $gv->hoc_vi = $request->hocVi;
            $gv->email = $request->email;
            $gv->cccd = $request->cccd;
            $gv->ngay_sinh = $request->ngaySinh;
            $gv->so_dien_thoai = $request->soDienThoai;
            $gv->id_don_vi = $request->donVi;
            $gv->quyen = $request->quyen;
            $gv->capNhat();

            return response()->json(['message' => 'Chỉnh sửa thành công', 'status' => 200],200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Chỉnh sửa thất bại', 'status' => 500],500);
        }
    }

    public function deleteGiangVien(Request $request)
    {
        try {
            $gv = new GiangVienModel();
            $gv->id_giang_vien = $request->idGV;
            $gv->xoa();

            return response()->json(['message' => 'Xoá thành công', 'status' => 200],200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Xoá thất bại', 'status' => 500],500);
        }
    }

    public function postImportGiangVien(Request $request)
    {
        $dataExcel = SpreadsheetModel::readExcel($request->file('file-excel'));
        $tong = 0;
        $num_row = 0;
        $dataArray = array();
        foreach ($dataExcel['data'] as $item) {
            if (trim($item[0]) == '')
                break;
            $num_row++;
            if ($num_row == 1)
                continue;

            $data = [
                'id_giang_vien' => trim($item[0]),
                'ho_ten'        => trim($item[1]),
                'hoc_vi'        => trim($item[2]),
                'email'         => trim($item[3]),
                'cccd'          => trim($item[4]),
                'ngay_sinh'     => trim($item[5]) ? \Carbon\Carbon::parse(trim($item[5]))->format('Y-m-d') : null, // Chuyển đổi ngày tháng nếu có, nếu không thì để null
                'so_dien_thoai' => trim($item[6]),
                'id_don_vi'     => trim($item[7]),
                'quyen'         => trim($item[8]),
            ];
            $dataArray[] = $data;
        }

        foreach ($dataArray as $data) {
            $gv = new GiangVienModel();
            $gv->id_giang_vien = (int)$data['id_giang_vien'];
            $gv->ho_ten = $data['ho_ten'];
            $gv->hoc_vi = $data['hoc_vi'];
            $gv->email = $data['email'];
            $gv->cccd = $data['cccd'];
            $gv->ngay_sinh = $data['ngay_sinh'];
            $gv->so_dien_thoai = $data['so_dien_thoai'];
            $gv->id_don_vi = (int)$data['id_don_vi'];
            $gv->quyen = $data['quyen'];

            $count = $gv->them();
            if ($count)
                $tong++;
        }
        if($tong == $num_row-1)
            return response()->json(['message' => 'Nhập thành công', 'status' => 200],200);
        return response()->json(['message' => 'Nhập thất bại', 'status' => 500],500);

    }


    public function searchGiangVien(Request $request)
    {
        $searchTerm = $request->input('term');  // 'term' là tham số từ AJAX request

        // Sửa đổi truy vấn để sử dụng tên cột chính xác
        $giangViens = DB::table('giang_vien') // Đảm bảo rằng 'giang_vien' là tên đúng của bảng trong CSDL
        ->where('ho_ten', 'LIKE', '%' . $searchTerm . '%')
            ->take(10) // giới hạn số lượng kết quả trả về
            ->get(['id_giang_vien as id', 'ho_ten as value']); // chỉ trả về id và ten_giang_vien

        return response()->json($giangViens);
    }

}
