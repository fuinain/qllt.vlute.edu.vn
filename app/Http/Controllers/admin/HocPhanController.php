<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\GiangVienModel;
use App\Models\admin\HocPhanModel;
use App\Models\SpreadsheetModel;
use Illuminate\Http\Request;

class HocPhanController extends Controller
{
    public function getViewDanhSach()
    {
        $hp = new HocPhanModel();
        $data = $hp->danhSach();
        return view('admin.quanlyhocphan.danh-sach', ['dshp' => $data]);
    }

    public function getViewThem()
    {
        return view('admin.quanlyhocphan.them');
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
            return response()->json([
                'message' => 'Thêm thành công',
                'status'  => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Thêm thất bại',
                'status'  => 500
            ], 500);
        }

    }

    public function getViewCapNhat($id_hoc_phan, Request $request)
    {
        $hp = new HocPhanModel();
        $hp->id_hoc_phan = $id_hoc_phan;
        return view('admin.quanlyhocphan.cap-nhat', ['ct' => $hp->chiTiet()]);
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

            return response()->json([
                'message' => 'Chỉnh sửa thành công',
                'status'  => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Chỉnh sửa thất bại',
                'status'  => 500
            ], 500);
        }

    }

    public function deleteHocPhan(Request $request)
    {
        try {
            $hp = new HocPhanModel();
            $hp->id_hoc_phan = $request->id_hoc_phan;
            $hp->xoa();
            return response()->json([
                'message' => 'Xoá thành công',
                'status'  => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Xoá thất bại',
                'status'  => 500
            ], 500);
        }
    }

    public function postImportHocPhan(Request $request)
    {
        try {
            $dataExcel = SpreadsheetModel::readExcel($request->file('file-excel'));
            $num_row = 0;
            $dataArray = array();
//            dd($dataExcel['data']);
            foreach ($dataExcel['data'] as $item) {
                $num_row++;
                if ($num_row <= 2) {
                    continue; // Skip header row
                }

                $data = [
                    'ma_hoc_phan' => trim($item[0]),
                    'ten_hoc_phan' => trim($item[1]),
                    'so_tin_chi' => intval(trim($item[2])),
                    'tin_chi_ly_thuyet' => intval(trim($item[3])),
                    'tin_chi_thuc_hanh' => intval(trim($item[4])),
                ];
                $dataArray[] = $data;
            }

            if (!empty($dataArray)) {
                foreach ($dataArray as $data) {
                    HocPhanModel::create($data);
                }
                return response()->json(['status' => 200, 'message' => 'Import successfully']);
            } else {
                return response()->json(['status' => 400, 'message' => 'No data for import']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'message' => 'An error occurred ' . $e->getMessage()]);
        }
    }
}
