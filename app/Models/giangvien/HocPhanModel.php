<?php

namespace App\Models\giangvien;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HocPhanModel extends Model
{
    use HasFactory;
    protected  $table = 'data_crawl_from_vlute_ems';

    public  function getHocPhan($ma_hoc_phan)
    {
        return $this
            ->select('*', DB::raw("TRIM(SUBSTRING_INDEX(data_crawl_from_vlute_ems.ten_hoc_phan, '-', 1)) AS ten_hoc_phan_cut"))
            ->where('ma_hoc_phan', $ma_hoc_phan)
            ->leftJoin('hoc_ky', 'data_crawl_from_vlute_ems.id_hoc_ky', '=', 'hoc_ky.id')
            ->leftJoin('giang_vien', 'data_crawl_from_vlute_ems.id_giang_vien', '=', 'giang_vien.id_giang_vien')
            ->leftJoin('don_vi', 'giang_vien.id_don_vi', '=', 'don_vi.id')
            ->firstOrFail();
    }

    public  function getTuanHoc($tuan_hoc, $ma_hoc_phan)
    {
        $ma_hoc_phan = $ma_hoc_phan . '%';
        return $this->select('*', DB::raw("TRIM(SUBSTRING_INDEX(data_crawl_from_vlute_ems.ten_hoc_phan, '-', 1)) AS ten_hoc_phan_cut"))
            ->whereRaw("TRIM(SUBSTRING_INDEX(data_crawl_from_vlute_ems.ten_hoc_phan, '-', 1)) LIKE  ?", [$ma_hoc_phan])
            ->where('tuan_hoc', $tuan_hoc)
            ->get();
    }

    public function getMain($ma)
    {
        return DB::table('hoc_phan')->where('ma_hoc_phan', trim(explode("_",$ma)[0]))->first();
    }
    public function saveLichDay($data,$ma_hoc_phan)
    {
        DB::table('lich_day')->where('ma_hoc_phan',$ma_hoc_phan)->delete();
        return DB::table('lich_day')->insert($data);
    }
    public  function  getLich($ma_hoc_phan){
        return DB::table('lich_day')->where('ma_hoc_phan', $ma_hoc_phan)->get();
    }
}
