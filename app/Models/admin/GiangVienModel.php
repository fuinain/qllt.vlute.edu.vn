<?php

namespace App\Models\admin;

use App\Traits\GiangVien;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GiangVienModel extends Model
{
    use HasFactory, GiangVien;

    public function them(){
       $sql="INSERT INTO giang_vien(id_giang_vien, ho_ten, hoc_vi, email, cccd, ngay_sinh, so_dien_thoai, id_don_vi, quyen) VALUE (:id_giang_vien, :ho_ten, :hoc_vi, :email, :cccd, :ngay_sinh, :so_dien_thoai, :id_don_vi, :quyen);";
       $par = [
           'id_giang_vien' => $this->id_giang_vien,
           'ho_ten' => $this->ho_ten,
           'hoc_vi' => $this->hoc_vi,
           'email' => $this->email,
           'cccd' => $this->cccd,
           'ngay_sinh' => $this->ngay_sinh,
           'so_dien_thoai' => $this->so_dien_thoai,
           'id_don_vi' => $this->id_don_vi,
           'quyen' => $this->quyen,
       ];
       return DB::insert($sql, $par);
    }
}
