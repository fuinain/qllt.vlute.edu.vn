<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DonViModel extends Model
{
    use HasFactory;
    public function danhSach()
    {
        $sql = "SELECT * FROM `don_vi`";
        return DB::select($sql);
    }
}
