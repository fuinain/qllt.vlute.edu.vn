<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HocKyModel extends Model
{
    use HasFactory;

    public function danhSach()
    {
        $sql = "SELECT id, ma_hoc_ky, ten_hoc_ky, ngay_bat_dau, nam_hoc, tuan_bat_dau, so_tuan, loai_hoc_ky FROM hoc_ky ORDER BY ma_hoc_ky DESC;";
        return DB::select($sql);
    }
}
