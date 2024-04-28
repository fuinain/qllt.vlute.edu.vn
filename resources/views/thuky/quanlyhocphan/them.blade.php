@extends('thuky.master')
@section('body')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý lịch trình / Học phần / Thêm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{action('App\Http\Controllers\thuky\DashBoardController@getViewDashBoard')}}"><i
                                    class="nav-icon fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{action('App\Http\Controllers\thuky\HocPhanController@getViewDanhSach')}}">Danh
                                sách học phần</a></li>
                        <li class="breadcrumb-item active">Thêm</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- content-header -->

    <!-- body -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-body pad table-responsive">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Mã học phần</label>
                                <input class="form-control maHP" type="text" placeholder="Nhập vào mã học phần">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group ">
                                <label>Tên học phần</label>
                                <input class="form-control tenHP" type="text" placeholder="Nhập vào tên học phần">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group ">
                                <label>Số tín chỉ</label>
                                <input class="form-control soTC" type="number" placeholder="Nhập vào số tín chỉ">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group ">
                                <label>Tín chỉ lý thuyết</label>
                                <input class="form-control TCLT" type="number" placeholder="Nhập vào số tín chỉ lý thuyết">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group ">
                                <label>Tín chỉ thực hành</label>
                                <input class="form-control TCTH" type="number" placeholder="Nhập vào số tín chỉ thực hành">
                            </div>
                        </div>
                    </div>
                    <div class="pb-1" style="width: 150px">
                        <button type="button" class="btn btn-block btn-success btnXacNhan">Xác Nhận Thêm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end body -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.btnXacNhan').click(function (event) {
                event.preventDefault()
                $.ajax({
                    url: '{{action('App\Http\Controllers\thuky\HocPhanController@putHocPhan')}}',
                    type: "PUT",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'maHP': $('.maHP').val(),
                        'tenHP': $('.tenHP').val(),
                        'soTC': $('.soTC').val(),
                        'TCLT': $('.TCLT').val(),
                        'TCTH': $('.TCTH').val(),
                    },
                    success: function (result) {
                        if (result.status === 200) {
                            toastr.success(result.message);
                            setTimeout(function () {
                                location.reload();
                            }, 750);
                        } else {
                            toastr.error(result.message);
                        }
                    },
                    error: function (error) {
                        toastr.error("Thêm thất bại");
                    }
                })
            });
        })
    </script>
@endsection
