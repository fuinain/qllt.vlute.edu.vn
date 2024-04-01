<?php

namespace App\Models\taikhoan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhatKyModel extends Model
{
    protected $table = 'nhat_ky'; // Tên của bảng trong cơ sở dữ liệu

    protected $fillable = ['id_tai_khoan', 'mo_ta']; // Các cột có thể được gán dữ liệu

    /**
     * Ghi nhật ký vào cơ sở dữ liệu
     *
     * @return void
     */
    public function insertNhatKy()
    {
        // Thực hiện thêm một bản ghi mới vào bảng nhat_ky
        $this->save();
    }
}
