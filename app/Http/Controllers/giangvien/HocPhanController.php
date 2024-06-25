<?php

namespace App\Http\Controllers\giangvien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\giangvien\HocPhanModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
class HocPhanController extends Controller
{
    public function getViewChiTiet($ma_hoc_phan, Request $request)
    {
        $hocPhanModel = new HocPhanModel();
        $hoc_phan = $hocPhanModel->getHocPhan($ma_hoc_phan);
        $hoc_phan_main = $hocPhanModel->getMain($hoc_phan->ten_hoc_phan_cut);
        if(str_contains($hoc_phan->ten_hoc_phan_cut, 'BT') || str_contains($hoc_phan_main->ten_hoc_phan, 'CNTT')) {
            $lich_day = $hocPhanModel->getLich(trim(explode("-",$hoc_phan->ten_hoc_phan)[0]),'lich_day_th');
            return view('giangvien.quanlyhocphan.chitiet-TH',
                ['mhp'=>$ma_hoc_phan, 'hoc_phan' => $hoc_phan,'ten_hoc_phan_cut' => $hoc_phan->ten_hoc_phan_cut,
                 'hoc_phan_main'=> $hoc_phan_main,'lich_day' => $lich_day->toArray()]);
        }
        $lich_day = $hocPhanModel->getLich(trim(explode("-",$hoc_phan->ten_hoc_phan)[0]),'lich_day');
        return view('giangvien.quanlyhocphan.chitiet-LT',
            ['mhp'=>$ma_hoc_phan, 'hoc_phan' => $hoc_phan,'ten_hoc_phan_cut' => $hoc_phan->ten_hoc_phan_cut,
             'hoc_phan_main'=> $hoc_phan_main,'lich_day' => $lich_day->toArray()]);
    }
    public function postChiTietLyThuyet(Request $request) {
        $data_insert = [];
        $hocPhanModel = new HocPhanModel();
        foreach ($request->noi_dung as $i => $value){
            $data = [
                'ma_hoc_phan' => trim(explode("-",$request->ten_hoc_phan)[0]),
                'id_hoc_phan' => $request->id_hoc_phan,
                'noi_dung_giang_day' => $value,
                'bai_giang' => $request->bai_giang[$i],
                'bai_tap' => $request->bai_tap[$i],
                'thuc_hanh' => $request->thuc_hanh[$i],
                'cong_viec_chuan_bi' => $request->cong_viec[$i],
                'ghi_chu' => $request->ghi_chu[$i],
                'id_don_vi' => $request->id_don_vi,
                'id_hoc_ky' => $request->id_hoc_ky,
                'id_giang_vien' => $request->id_giang_vien,
                'gv_giang_day_chinh' =>  $request->ten_can_bo,
            ];
            array_push($data_insert, $data);
        }
        $hocPhanModel->saveLichDay($data_insert,$request->ma_hoc_phan,trim(explode("-",$request->ten_hoc_phan)[0]));
        return redirect()->route('giangvien.quanlyhocphan.chitiet.view', $request->ma_hoc_phan);
    }

    public function postChiTietThucHanh(Request $request) {
        $data_insert = [];
        $hocPhanModel = new HocPhanModel();
        foreach ($request->noi_dung as $i => $value){
            $data = [
                'ma_hoc_phan' => trim(explode("-",$request->ten_hoc_phan)[0]),
                'id_hoc_phan' => $request->id_hoc_phan,
                'ten_de_muc' => $request->ten_de_muc[$i],
                'so_gio_quy_dinh' => $request->so_gio_quy_dinh[$i],
                'noi_dung' => $request->noi_dung[$i],
                'ghi_chu' => $request->ghi_chu[$i],
                'id_don_vi' => $request->id_don_vi,
                'id_hoc_ky' => $request->id_hoc_ky,
                'id_giang_vien' => $request->id_giang_vien,
                'gv_giang_day_chinh' =>  $request->ten_can_bo,
            ];
            array_push($data_insert, $data);
        }
        $hocPhanModel->saveLichDay($data_insert,$request->ma_hoc_phan,trim(explode("-",$request->ten_hoc_phan)[0]),'lich_day_th');
        return redirect()->route('giangvien.quanlyhocphan.chitiet.view', $request->ma_hoc_phan);
    }
    public function exportFromTemplate($ma_hoc_phan)
    {
        // Load the template file
        $hocPhanModel = new HocPhanModel();
        $hoc_phan = $hocPhanModel->getHocPhan($ma_hoc_phan);
        $hoc_phan_main = $hocPhanModel->getMain($hoc_phan->ten_hoc_phan_cut);
        $lich_day = $hocPhanModel->getLich($hoc_phan->ten_hoc_phan_cut)->toArray();
        $tuan_hoc = $hocPhanModel->getTuanHoc($hoc_phan->tuan_hoc, $hoc_phan_main->ma_hoc_phan);
        $all_tuan = '';
        foreach ($tuan_hoc as $tuan) {
        $all_tuan = $all_tuan . $tuan->ma_hoc_phan . PHP_EOL;
        }
        $templatePath = storage_path('/public/excel/BieuMauHP.xlsx');
        if (!($hoc_phan->loai_hoc_ky == 1 || $hoc_phan->loai_hoc_ky == 2)) {
            $templatePath = storage_path('/public/excel/BieuMauHPPhu.xlsx');
        }
        // Lấy tuần
        $trimmedInput = trim(str_replace('Tuần học:', '', $hoc_phan->tuan_hoc));
        // Tách các tuần bằng dấu -
        $weeks = array_map('trim', explode('-', $trimmedInput));
        // Lọc các giá trị rỗng và chuyển đổi sang số nguyên
        $weeks = array_filter($weeks, fn($week) => is_numeric($week));
        $weeks =  array_values(array_map('intval', $weeks));

        $spreadsheet = IOFactory::load($templatePath);
        if(str_contains($hoc_phan->ten_hoc_phan_cut, 'BT') || str_contains($hoc_phan_main->ten_hoc_phan, 'CNTT')) {
            $total =  $hoc_phan_main->tin_chi_thuc_hanh * 36 ?? 0;
            $online = $hoc_phan_main->tin_chi_thuc_hanh * 30 ?? 0;
            $offline = $hoc_phan_main->tin_chi_thuc_hanh * 6 ?? 0;
        } else {
            $total =  $hoc_phan_main->tin_chi_ly_thuyet * 18 ?? 0;
            $online = $hoc_phan_main->tin_chi_ly_thuyet * 15 ?? 0;
            $offline = $hoc_phan_main->tin_chi_ly_thuyet * 3 ?? 0;
        }
        // Get the active sheet
        $sheet = $spreadsheet->getActiveSheet();
        // Example: Replace placeholder with dynamic content
        $sheet->setCellValue('A5', 'Khoa: ' .$hoc_phan->ma_don_vi);
        $sheet->setCellValue('A6', 'Năm học: '.trim(explode(",",$hoc_phan->ten_hoc_ky)[1]));
        $sheet->setCellValue('A7', 'Học kỳ: '.trim(explode(",",$hoc_phan->ten_hoc_ky)[0]));
        $sheet->setCellValue('D5','Học phần: ' . $hoc_phan_main->ten_hoc_phan);
        $sheet->setCellValue('D6', 'Mã số học phần: '. $hoc_phan_main->ma_hoc_phan);
        $sheet->setCellValue('D8', 'Cán bộ giảng dạy chính: ' .  (array_key_exists(0, $lich_day) ? $lich_day[0]->gv_giang_day_chinh : ''));
        $sheet->setCellValue('D7', 'Cán bộ giảng dạy: ' . $hoc_phan->ho_ten);
        $sheet->setCellValue('J34', $hoc_phan->ho_ten);
        $sheet->setCellValue('J5','Tổng số giờ giảng: ' . ($total ?? 0));
        $sheet->setCellValue('J6', 'Số giờ giảng trực tiếp: ' . $online);
        $sheet->setCellValue('J7','Số giờ giảng trực tuyến: ' . $offline);
        $sheet->setCellValue('H11',$all_tuan);
        $sheet->mergeCells('J28:K28');
        $sheet->setCellValue('J28', 'Vĩnh Long, ngày ' . date('d') .' tháng ' . date('m') . ' năm ' . date('Y') );

        if (count($weeks) > 5) {
            for ($i = 0; $i < 15; $i++) {
                $sheet->setCellValue('A' . (12 + $i), \Carbon\Carbon::parse($hoc_phan->ngay_bat_dau)->addDays(($i) * 7)->format('m'));
                $sheet->setCellValue('B' . (12 + $i), ($i > count($weeks) - 1 ? '' : $weeks[$i]));
                $sheet->mergeCells('C' . (12 + $i) . ':D' . (12 + $i));
                $sheet->setCellValue('C' . (12 + $i), array_key_exists($i,$lich_day) ? trim($lich_day[$i]->noi_dung_giang_day) : '');
                $sheet->setCellValue('E' . (12 + $i), array_key_exists($i,$lich_day) ? $lich_day[$i]->bai_giang : '');
                $sheet->setCellValue('F' . (12 + $i), array_key_exists($i,$lich_day) ? $lich_day[$i]->bai_tap : '');
                $sheet->setCellValue('G' . (12 + $i), array_key_exists($i,$lich_day) ? $lich_day[$i]->thuc_hanh : '');
                $sheet->setCellValue('J' . (12 + $i), array_key_exists($i,$lich_day) ? $lich_day[$i]->cong_viec_chuan_bi : '');
                $sheet->setCellValue('K' . (12 + $i), array_key_exists($i,$lich_day) ? $lich_day[$i]->ghi_chu : '');
            }
        } else {
            for ($i = 0; $i < 5; $i++) {
                $sheet->setCellValue('A' . (12 + $i),
                    \Carbon\Carbon::parse($hoc_phan->ngay_bat_dau)->addDays(($i)
                        * 7)->format('m'));
                $sheet->setCellValue('B' . (12 + $i),
                    ($i > count($weeks) - 1 ? '' : $weeks[$i]));
                $sheet->mergeCells('C' . (12 + $i) . ':D' . (12 + $i));
                $sheet->setCellValue('C' . (12 + $i),
                    array_key_exists($i, $lich_day)
                        ? trim($lich_day[$i]->noi_dung_giang_day) : '');
                $sheet->setCellValue('E' . (12 + $i),
                    array_key_exists($i, $lich_day) ? $lich_day[$i]->bai_giang
                        : '');
                $sheet->setCellValue('F' . (12 + $i),
                    array_key_exists($i, $lich_day) ? $lich_day[$i]->bai_tap
                        : '');
                $sheet->setCellValue('G' . (12 + $i),
                    array_key_exists($i, $lich_day) ? $lich_day[$i]->thuc_hanh
                        : '');
                $sheet->setCellValue('J' . (12 + $i),
                    array_key_exists($i, $lich_day)
                        ? $lich_day[$i]->cong_viec_chuan_bi : '');
                $sheet->setCellValue('K' . (12 + $i),
                    array_key_exists($i, $lich_day) ? $lich_day[$i]->ghi_chu
                        : '');
            }
        }

        // Save the modified spreadsheet as a new file
        $nameExport = $hoc_phan->ten_hoc_phan_cut . '_' . $hoc_phan_main->ten_hoc_phan;
        $exportPath = storage_path('/public/excel/'. $nameExport . '.xlsx');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($exportPath);

        return response()->download($exportPath)->deleteFileAfterSend(true);
    }

    public function  importFromTemplateTH(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:xlsx,xls',
            ]);
            $hocPhanModel = new HocPhanModel();
            $file = $request->file('file');

            $spreadsheet = IOFactory::load($file);

            $worksheet = $spreadsheet->getActiveSheet();
            $dataSheet = $worksheet->toArray();
            $hoc_phan = $hocPhanModel->getHocPhan($request->ma_hoc_phan);
            $cellValue = [];
            $getHocPhanChung = $hocPhanModel->getHocPhanChung($hoc_phan->ten_hoc_phan);
            for (
                $row = 11; $row < (($hoc_phan->loai_hoc_ky == 1
                || $hoc_phan->loai_hoc_ky == 2) ? 20 : 15); $row++
            ) {
                $data = [
                    'ma_hoc_phan' => trim(explode("-",$hoc_phan->ten_hoc_phan)[0]),
                    'id_hoc_phan' => $request->id_hoc_phan,
                    'ten_de_muc' => $dataSheet[$row][1],
                    'so_gio_quy_dinh' => $dataSheet[$row][2],
                    'noi_dung' => $dataSheet[$row][4],
                    'ghi_chu' => $dataSheet[$row][6],
                    'id_don_vi' => $hoc_phan->id_don_vi,
                    'id_hoc_ky' => $hoc_phan->id_hoc_ky,
                    'id_giang_vien' => $hoc_phan->id_giang_vien,
                    'gv_giang_day_chinh' => trim(explode(":",
                        $dataSheet[6][2])[1] ?? ''),
                ];
                array_push($cellValue, $data);
            }

            $hocPhanModel->saveLichDay($cellValue,$request->ma_hoc_phan,trim(explode("-",$hoc_phan->ten_hoc_phan)[0]),'lich_day_th');

            return response()->json([
                'message' => 'Thành công',
                'status' => 200
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json([
                'message' => 'Thất bại',
                'status' => 500
            ]);
        }
    }

    public function exportFromTemplateTH($ma_hoc_phan)
    {
        // Load the template file
        $hocPhanModel = new HocPhanModel();
        $hoc_phan = $hocPhanModel->getHocPhan($ma_hoc_phan);
        $hoc_phan_main = $hocPhanModel->getMain($hoc_phan->ten_hoc_phan_cut);
        $lich_day = $hocPhanModel->getLich($hoc_phan->ten_hoc_phan_cut,'lich_day_th')->toArray();
        $tuan_hoc = $hocPhanModel->getTuanHoc($hoc_phan->tuan_hoc, $hoc_phan_main->ma_hoc_phan);
        $all_tuan = '';
        foreach ($tuan_hoc as $tuan) {
            $all_tuan = $all_tuan . $tuan->ma_hoc_phan . PHP_EOL;
        }
        // Lấy tuần
        $trimmedInput = trim(str_replace('Tuần học:', '', $hoc_phan->tuan_hoc));
        // Tách các tuần bằng dấu -
        $weeks = array_map('trim', explode('-', $trimmedInput));
        // Lọc các giá trị rỗng và chuyển đổi sang số nguyên
        $weeks = array_filter($weeks, fn($week) => is_numeric($week));
        $weeks =  array_values(array_map('intval', $weeks));

        $templatePath = storage_path('/public/excel/BieuMau_TH5.xlsx');
        if (count($weeks) > 5) {
            $templatePath = storage_path('/public/excel/BieuMau_TH10.xlsx');
        }

        $spreadsheet = IOFactory::load($templatePath);
        if(str_contains($hoc_phan->ten_hoc_phan_cut, 'BT') || str_contains($hoc_phan_main->ten_hoc_phan, 'CNTT')) {
            $total =  $hoc_phan_main->tin_chi_thuc_hanh * 36 ?? 0;
            $online = $hoc_phan_main->tin_chi_thuc_hanh * 30 ?? 0;
            $offline = $hoc_phan_main->tin_chi_thuc_hanh * 6 ?? 0;
        } else {
            $total =  $hoc_phan_main->tin_chi_ly_thuyet * 18 ?? 0;
            $online = $hoc_phan_main->tin_chi_ly_thuyet * 15 ?? 0;
            $offline = $hoc_phan_main->tin_chi_ly_thuyet * 3 ?? 0;
        }
        // Get the active sheet
        $sheet = $spreadsheet->getActiveSheet();
        // Example: Replace placeholder with dynamic content
        $sheet->setCellValue('A4', 'Khoa: ' .$hoc_phan->ma_don_vi);
        $sheet->setCellValue('A5', 'Năm học: '.trim(explode(",",$hoc_phan->ten_hoc_ky)[1]));
        $sheet->setCellValue('C5', 'Học kỳ: '.trim(explode(",",$hoc_phan->ten_hoc_ky)[0]));
        $sheet->setCellValue('C6','Tên học phần: ' . $hoc_phan_main->ten_hoc_phan);
        $sheet->setCellValue('A6', 'Mã số học phần: '. $hoc_phan_main->ma_hoc_phan);
        $sheet->setCellValue('C7', 'Cán bộ giảng dạy chính: ' .  (array_key_exists(0, $lich_day) ? $lich_day[0]->gv_giang_day_chinh : ''));
        $sheet->setCellValue('A7', 'Cán bộ giảng dạy: ' . $hoc_phan->ho_ten);
        $sheet->setCellValue('F5','Tổng số giờ giảng: ' . ($total ?? 0));
        $sheet->setCellValue('F6', 'Số giờ giảng trực tiếp: ' . $online);
        $sheet->setCellValue('F7','Số giờ giảng trực tuyến: ' . $offline);

        if (count($weeks) > 5) {
            $sheet->mergeCells('E21:G21');
            $sheet->setCellValue('E21', 'Vĩnh Long, ngày ' . date('d') .' tháng ' . date('m') . ' năm ' . date('Y') );
            $sheet->mergeCells('E26:G26');
            $sheet->setCellValue('E26', (array_key_exists(0, $lich_day) ? $lich_day[0]->gv_giang_day_chinh : '') );
            for ($i = 0; $i < 10; $i++) {
                $sheet->setCellValue('A' . (11 + $i), $i + 1);
                $sheet->setCellValue('B' . (11 + $i), array_key_exists($i,$lich_day) ? trim($lich_day[$i]->ten_de_muc) : '');
                $sheet->setCellValue('C' . (11 + $i), array_key_exists($i,$lich_day) ? trim($lich_day[$i]->so_gio_quy_dinh) : '');
                $sheet->setCellValue('E' . (11 + $i), array_key_exists($i,$lich_day) ? $lich_day[$i]->noi_dung : '');
                $sheet->setCellValue('F' . (11 + $i), ($i > count($weeks) - 1 ? '' : $weeks[$i]));
                $sheet->setCellValue('G' . (11 + $i), array_key_exists($i,$lich_day) ? $lich_day[$i]->ghi_chu : '');
            }
        } else {
            $sheet->mergeCells('E16:G16');
            $sheet->setCellValue('E16', 'Vĩnh Long, ngày ' . date('d') .' tháng ' . date('m') . ' năm ' . date('Y') );
            $sheet->mergeCells('E21:G21');
            $sheet->setCellValue('E21', (array_key_exists(0, $lich_day) ? $lich_day[0]->gv_giang_day_chinh : '') );
            for ($i = 0; $i < 5; $i++) {
                $sheet->setCellValue('A' . (11 + $i), $i + 1);
                $sheet->setCellValue('B' . (11 + $i), array_key_exists($i,$lich_day) ? trim($lich_day[$i]->ten_de_muc) : '');
                $sheet->setCellValue('C' . (11 + $i), array_key_exists($i,$lich_day) ? trim($lich_day[$i]->so_gio_quy_dinh) : '');
                $sheet->setCellValue('E' . (11 + $i), array_key_exists($i,$lich_day) ? $lich_day[$i]->noi_dung : '');
                $sheet->setCellValue('F' . (11 + $i), ($i > count($weeks) - 1 ? '' : $weeks[$i]));
                $sheet->setCellValue('G' . (11 + $i), array_key_exists($i,$lich_day) ? $lich_day[$i]->ghi_chu : '');
            }
        }

        // Save the modified spreadsheet as a new file
        $nameExport = $hoc_phan->ten_hoc_phan_cut . '_' . $hoc_phan_main->ten_hoc_phan;
        $exportPath = storage_path('/public/excel/'. $nameExport . '.xlsx');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($exportPath);

        return response()->download($exportPath)->deleteFileAfterSend(true);
    }
    public function  importFromTemplate(Request $request)
    {
        try {
<<<<<<< Updated upstream
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        $hocPhanModel = new HocPhanModel();
        $file = $request->file('file');

        $spreadsheet = IOFactory::load($file);

        $worksheet = $spreadsheet->getActiveSheet();
        $dataSheet = $worksheet->toArray();
        $hoc_phan = $hocPhanModel->getHocPhan($request->ma_hoc_phan);
        $cellValue = [];
        $getHocPhanChung = $hocPhanModel->getHocPhanChung($hoc_phan->ten_hoc_phan);
                for (
                    $row = 11; $row < (($hoc_phan->loai_hoc_ky == 1
                    || $hoc_phan->loai_hoc_ky == 2) ? 26 : 16); $row++
                ) {
                    $data = [
                        'ma_hoc_phan' => trim(explode("-",$request->ten_hoc_phan)[0]),
                        'id_hoc_phan' => $request->id_hoc_phan,
                        'noi_dung_giang_day' => $dataSheet[$row][2],
                        'bai_giang' => $dataSheet[$row][4],
                        'bai_tap' => $dataSheet[$row][5],
                        'thuc_hanh' => $dataSheet[$row][6],
                        'cong_viec_chuan_bi' => $dataSheet[$row][9],
                        'ghi_chu' => $dataSheet[$row][10],
                        'id_don_vi' => $hoc_phan->id_don_vi,
                        'id_hoc_ky' => $hoc_phan->id_hoc_ky,
                        'id_giang_vien' => $hoc_phan->id_giang_vien,
                        'gv_giang_day_chinh' => trim(explode(":",
                            $dataSheet[7][3])[1] ?? ''),
                    ];
                    array_push($cellValue, $data);
                }
        $hocPhanModel->saveLichDay($cellValue,$request->ma_hoc_phan,trim(explode("-",$request->ten_hoc_phan)[0]));

        return response()->json([
            'message' => 'Thành công',
            'status' => 200
        ]);
        } catch (\Exception $e) {
=======
            $request->validate([
                'file' => 'required|mimes:xlsx,xls',
            ]);
            $hocPhanModel = new HocPhanModel();
            $file = $request->file('file');

            $spreadsheet = IOFactory::load($file);

            $worksheet = $spreadsheet->getActiveSheet();
            $dataSheet = $worksheet->toArray();
            $hoc_phan = $hocPhanModel->getHocPhan($request->ma_hoc_phan);
            $cellValue = [];
            $getHocPhanChung = $hocPhanModel->getHocPhanChung($hoc_phan->ten_hoc_phan);
            for (
                $row = 11; $row < (($hoc_phan->loai_hoc_ky == 1
                || $hoc_phan->loai_hoc_ky == 2) ? 26 : 16); $row++
            ) {
                $data = [
                    'ma_hoc_phan' => trim(explode("-", $request->ten_hoc_phan)[0]),
                    'id_hoc_phan' => $request->id_hoc_phan,
                    'noi_dung_giang_day' => $dataSheet[$row][2],
                    'bai_giang' => $dataSheet[$row][4],
                    'bai_tap' => $dataSheet[$row][5],
                    'thuc_hanh' => $dataSheet[$row][6],
                    'cong_viec_chuan_bi' => $dataSheet[$row][9],
                    'ghi_chu' => $dataSheet[$row][10],
                    'id_don_vi' => $hoc_phan->id_don_vi,
                    'id_hoc_ky' => $hoc_phan->id_hoc_ky,
                    'id_giang_vien' => $hoc_phan->id_giang_vien,
                    'gv_giang_day_chinh' => trim(explode(":",
                        $dataSheet[7][3])[1] ?? ''),
                ];
                array_push($cellValue, $data);
            }
            $hocPhanModel->saveLichDay($cellValue, $request->ma_hoc_phan, trim(explode("-", $request->ten_hoc_phan)[0]),'lich_day');

            return response()->json([
                'message' => 'Thành công',
                'status' => 200
            ]);
        }catch (\Exception $e) {
>>>>>>> Stashed changes
            dd($e->getMessage());
            return response()->json([
                'message' => 'Thất bại',
                'status' => 500
            ]);
        }
    }
}
