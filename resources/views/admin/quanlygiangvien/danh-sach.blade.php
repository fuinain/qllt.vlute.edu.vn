@extends('admin.master')
@section('body')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý lịch trình / Giảng viên</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="nav-icon fas fa-tachometer-alt"></i>Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{action('App\Http\Controllers\admin\GiangVienController@getViewDanhSach')}}">Danh sách giảng viên</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- content-header -->

    <!-- body -->
    <section class="content">

        <div class="container-fluid">
            <div class="pb-1" style="width: 100px">
                <a href="{{action('App\Http\Controllers\admin\GiangVienController@getViewThem')}}" type="button" class="btn btn-block bg-gradient-success">Thêm mới</a>
            </div>
            <div class="card card-primary card-outline">
                <div class="card-body pad table-responsive">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Học vị</th>
                                    <th>Email</th>
                                    <th>Ngày sinh</th>
                                    <th>SĐT</th>
                                    <th>Đơn vị</th>
                                    <th>Quyền</th>
                                </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </section>
    <!-- end body -->
@endsection
