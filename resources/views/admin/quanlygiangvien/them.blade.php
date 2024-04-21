@extends('admin.master')
@section('body')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý lịch trình / Giảng viên / Thêm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                    class="nav-icon fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{action('App\Http\Controllers\admin\GiangVienController@getViewDanhSach')}}">Danh
                                sách giảng viên</a></li>
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
                                <label>Id giảng viên</label>
                                <input class="form-control idGV" type="number"
                                       placeholder="Yêu cầu nhập trùng với hệ thống ems, mới có thể truy xuât dữ liệu">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input class="form-control hoTen" type="text" placeholder="Họ và tên">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Học vị</label>
                                <select class="form-control hocVi">
                                    <option value="Cử nhân">Cử nhân</option>
                                    <option value="Kỹ sư">Kỹ sư</option>
                                    <option value="Thạc sĩ">Thạc sĩ</option>
                                    <option value="Tiến sĩ">Tiến sĩ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email </label>
                                <input class="form-control email" type="text" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group ">
                                <label>CCCD</label>
                                <input class="form-control cccd" type="text" placeholder="CCCD">
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <label>Ngày sinh:</label>
                                <input class="form-control ngaySinh" type="date" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>SĐT</label>
                                <input class="form-control soDienThoai" type="text" placeholder="SĐT">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group donvi">
                                <label>Đơn vị</label>
                                <select class="form-control donVi">
                                    @foreach($dv as $item)
                                        <option value="{{$item->id}}">{{$item->ten_don_vi}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Quyền</label>
                                <select class="form-control quyen">
                                    <option value="admin">Admin</option>
                                    <option value="thuky">Thư ký</option>
                                    <option value="giangvien">Giảng viên</option>
                                </select>
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
                    url: '{{action('App\Http\Controllers\admin\GiangVienController@putGiangVien')}}',
                    type: "PUT",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'idGV': $('.idGV').val(),
                        'hoTen': $('.hoTen').val(),
                        'hocVi': $('.hocVi').val(),
                        'email': $('.email').val(),
                        'cccd': $('.cccd').val(),
                        'ngaySinh': $('.ngaySinh').val(),
                        'soDienThoai': $('.soDienThoai').val(),
                        'donVi': $('.donVi').val(),
                        'quyen': $('.quyen').val(),

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
