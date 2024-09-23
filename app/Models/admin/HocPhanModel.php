<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HocPhanModel extends Model
{
    use HasFactory;
    protected $table = 'hoc_phan';
    protected $primaryKey = 'id_hoc_phan';
    protected $fillable = [
        'ma_hoc_phan',
        'ten_hoc_phan',
        'so_tin_chi',
        'tin_chi_ly_thuyet',
        'tin_chi_thuc_hanh',
    ];

    public $timestamps = false;

    public function danhSach()
    {
        $sql = "SELECT * FROM `hoc_phan`ORDER BY ma_hoc_phan ASC;";
        return DB::select($sql);
    }

    public function capNhat()
    {
        $sql
            = "UPDATE hoc_phan SET
                      ma_hoc_phan = :ma_hoc_phan,
                      ten_hoc_phan = :ten_hoc_phan,
                      so_tin_chi = :so_tin_chi,
                      tin_chi_ly_thuyet = :tin_chi_ly_thuyet,
                      tin_chi_thuc_hanh = :tin_chi_thuc_hanh
                      WHERE id_hoc_phan = :id_hoc_phan";

        $par = [
            'id_hoc_phan'       => $this->id_hoc_phan,
            'ma_hoc_phan'       => $this->ma_hoc_phan,
            'ten_hoc_phan'      => $this->ten_hoc_phan,
            'so_tin_chi'        => $this->so_tin_chi,
            'tin_chi_ly_thuyet' => $this->tin_chi_ly_thuyet,
            'tin_chi_thuc_hanh' => $this->tin_chi_thuc_hanh,
        ];
        return DB::update($sql, $par);
    }

    public function them()
    {
        $sql
            = "INSERT INTO hoc_phan(ma_hoc_phan, ten_hoc_phan, so_tin_chi, tin_chi_ly_thuyet, tin_chi_thuc_hanh) VALUE (:ma_hoc_phan, :ten_hoc_phan, :so_tin_chi, :tin_chi_ly_thuyet, :tin_chi_thuc_hanh);";
        $par = [
            'ma_hoc_phan'       => $this->ma_hoc_phan,
            'ten_hoc_phan'      => $this->ten_hoc_phan,
            'so_tin_chi'        => $this->so_tin_chi,
            'tin_chi_ly_thuyet' => $this->tin_chi_ly_thuyet,
            'tin_chi_thuc_hanh' => $this->tin_chi_thuc_hanh,
        ];
        return DB::insert($sql, $par);
    }

    public function chiTiet()
    {
        $sql
            = "SELECT * from hoc_phan WHERE id_hoc_phan = :id_hoc_phan";
        $par = [
            'id_hoc_phan' => $this->id_hoc_phan,
        ];
        return DB::selectOne($sql, $par);
    }

    public function xoa(){
        $sql = "DELETE FROM hoc_phan WHERE id_hoc_phan = :id_hoc_phan";
        $par = [
            'id_hoc_phan' => $this->id_hoc_phan,
        ];
        return DB::delete($sql, $par);
    }
}
