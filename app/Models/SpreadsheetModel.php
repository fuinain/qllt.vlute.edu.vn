<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;
class SpreadsheetModel extends Model
{
    public static function readExcel($file)
    {
        $data = [];
        $row_limit = 0;
        $column_limit = 0;
        if (file_exists($file)) {
            $spreadsheet = IOFactory::load($file);
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $data = $sheet->toArray();
        }
        return [
            'col' => $column_limit,
            'row' => $row_limit,
            'data' => $data
        ];
    }
}
