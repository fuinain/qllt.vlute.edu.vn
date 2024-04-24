<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BieuMauController extends Controller
{
    public function getViewDanhSach()
    {
        // Lấy danh sách các file từ thư mục public/excel
        $files = File::allFiles(public_path('excel'));

        // Chỉ lấy tên file
        $fileNames = array_map(function ($file) {
            return $file->getFilename();
        }, $files);

        return view('admin.quanlybieumau.danh-sach', ['files' => $fileNames]);
    }

    public function uploadExcel(Request $request)
    {
        if ($request->hasFile('file-excel')) {
            $file = $request->file('file-excel');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('excel'), $fileName);

            return response()->json(['status'  => 200,
                                     'message' => 'Tải lên biểu mẫu thành công'
            ]);
        } else {
            return response()->json(['status'  => 400,
                                     'message' => 'Tải lên biểu mẫu thất bại'
            ]);
        }
    }

    public function deleteFile(Request $request)
    {
        $fileName = $request->input('fileName');

        // Xác nhận rằng file tồn tại trước khi xoá
        $filePath = public_path('excel/' . $fileName);
        if (File::exists($filePath)) {
            // Thực hiện xoá file
            File::delete($filePath);
            return response()->json([
                'status' => 200,
                'message' => 'Xoá biểu mẫu thành công.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy biểu mẫu để xoá.'
            ], 404);
        }
    }
}
