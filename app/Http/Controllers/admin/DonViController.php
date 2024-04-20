<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\DonViModel;
use Illuminate\Http\Request;

class DonViController extends Controller
{
    public function getDanhSach()
    {
        $dv = new DonViModel();
        $data = $dv->danhSach();
        return view('admin.quanlygiangvien.them', ['dv' => $data]);
    }
}
