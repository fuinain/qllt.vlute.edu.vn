<?php

namespace App\Models\taikhoan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DangNhapModel extends Model
{
    protected $table = 'tai_khoan'; // Tên của bảng trong cơ sở dữ liệu

    protected $fillable = ['email']; // Các cột có thể được gán dữ liệu

    /**
     * Xác thực thông tin đăng nhập của người dùng
     *
     * @return mixed
     */
    public function dangNhap()
    {
        // Truy vấn cơ sở dữ liệu để kiểm tra thông tin đăng nhập của người dùng
        return DB::table($this->table)
            ->where('email', $this->email)
            ->first();
    }
}
