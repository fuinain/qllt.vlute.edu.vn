<?php

namespace App\Models\admin;

use App\Traits\GiangVien;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GiangVienModel extends Model
{
    use HasFactory, GiangVien;

    public function them()
    {
        $sql
            = "INSERT INTO giang_vien(id_giang_vien, ho_ten, hoc_vi, email, cccd, ngay_sinh, so_dien_thoai, id_don_vi, quyen) VALUE (:id_giang_vien, :ho_ten, :hoc_vi, :email, :cccd, :ngay_sinh, :so_dien_thoai, :id_don_vi, :quyen);";
        $par = [
            'id_giang_vien' => $this->id_giang_vien,
            'ho_ten'        => $this->ho_ten,
            'hoc_vi'        => $this->hoc_vi,
            'email'         => $this->email,
            'cccd'          => $this->cccd,
            'ngay_sinh'     => $this->ngay_sinh,
            'so_dien_thoai' => $this->so_dien_thoai,
            'id_don_vi'     => $this->id_don_vi,
            'quyen'         => $this->quyen,
        ];
        return DB::insert($sql, $par);
    }

    public function danhSach()
    {
        $sql = "SELECT id_giang_vien, ho_ten,hoc_vi,email,cccd, ngay_sinh,so_dien_thoai,id_don_vi,quyen, don_vi.ten_don_vi FROM don_vi, giang_vien WHERE don_vi.id = giang_vien.id_don_vi";
        return DB::select($sql);
    }

    public function chiTiet()
    {
        $sql
            = "SELECT * from giang_vien WHERE id_giang_vien = :id_giang_vien";
        $par = [
            'id_giang_vien' => $this->id_giang_vien,
        ];
        return DB::selectOne($sql, $par);
    }

    public function capNhat()
    {
        $sql
            = "UPDATE giang_vien SET
                      ho_ten = :ho_ten,
                      hoc_vi = :hoc_vi,
                      email = :email,
                      cccd = :cccd,
                      ngay_sinh = :ngay_sinh,
                      so_dien_thoai = :so_dien_thoai,
                      id_don_vi = :id_don_vi,
                      quyen = :quyen
                      WHERE id_giang_vien = :id_giang_vien";

        $par = [
            'id_giang_vien' => $this->id_giang_vien,
            'ho_ten'        => $this->ho_ten,
            'hoc_vi'        => $this->hoc_vi,
            'email'         => $this->email,
            'cccd'          => $this->cccd,
            'ngay_sinh'     => $this->ngay_sinh,
            'so_dien_thoai' => $this->so_dien_thoai,
            'id_don_vi'     => $this->id_don_vi,
            'quyen'         => $this->quyen,
        ];
        return DB::update($sql, $par);
    }

    public function xoa(){
        $sql = "DELETE FROM giang_vien WHERE id_giang_vien = :id_giang_vien";
        $par = [
            'id_giang_vien' => $this->id_giang_vien,
        ];
        return DB::delete($sql, $par);
    }
}


