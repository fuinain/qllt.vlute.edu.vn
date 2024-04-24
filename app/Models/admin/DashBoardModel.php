<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DashBoardModel extends Model
{
    use HasFactory;

    public function themCrawlField()
    {
        $check = DB::table('crawl')
            ->delete();
        $sql
            = "INSERT INTO crawl(magv, hocky) VALUE (:magv, :hocky);";
        $par = [
            'magv'  => $this->magv,
            'hocky' => $this->hocky,
        ];

        return DB::insert($sql, $par);
    }

    public function danhsachTKBGiangVien()
    {
        return DB::table('data_crawl_from_vlute_ems')
            ->where('id_giang_vien', $this->id_giang_vien)
            ->where('id_hoc_ky', $this->id_hoc_ky)
            ->orderBy('key_thu')
            ->get();
    }
}
