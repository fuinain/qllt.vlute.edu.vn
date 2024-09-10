<?php

namespace App\Http\Controllers\thuky;

use App\Http\Controllers\Controller;
use App\Models\admin\HocKyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HocKyController extends Controller
{
    public function getViewDanhSach()
    {
        $hk = new HocKyModel();
        $data = $hk->danhSach();
        return view('thuky.quanlyhocky.danh-sach', ['hk' => $data]);
    }

    public function syncHocKy()
    {
        // Đường dẫn đến trình thông dịch Python
        $pythonPath = 'C:\Users\ADMIN\AppData\Local\Programs\Python\Python312\python.exe';

        // Đường dẫn đến file Python
        $pythonScriptPath = base_path('crawls/crawl_hoc_ky.py');

        // Thực thi script Python
        $output = null;
        $return_var = null;
        exec('"'.$pythonPath.'" "'.$pythonScriptPath.'" 2>&1', $output, $return_var);

        // Kiểm tra kết quả
        if ($return_var === 0) {
            // Script chạy thành công
            return response()->json(['message' => 'Đồng bộ học kỳ thành công', 'status' => 200],200);
        } else {
            // Script thất bại
            Log::error($output);
            Log::error($return_var);
            return response()->json(['message' => 'Đồng bộ học kỳ thất bại', 'status' => 500],500);
        }
    }
}
