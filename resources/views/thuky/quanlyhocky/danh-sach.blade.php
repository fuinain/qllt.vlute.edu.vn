@extends('admin.master')
@section('body')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý lịch trình / Học kỳ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{action('App\Http\Controllers\thuky\DashBoardController@getViewDashBoard')}}"><i
                                    class="nav-icon fas fa-tachometer-alt"></i>Home</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{action('App\Http\Controllers\thuky\HocKyController@getViewDanhSach')}}">Danh
                                sách học kỳ</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- content-header -->

    <!-- body -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex">
                <div class="pb-1 me-2">
                    <button href="" type="button" class="btn btn-block bg-gradient-success btnDongBoHK"><i class="fa fa-fw fa-history"></i> Đồng bộ học kì VLUTE EMS</button>
                </div>
            </div>

            <div class="card card-primary card-outline">
                <div class="card-body pad table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã học kỳ</th>
                            <th>Tên học kỳ</th>
                            <th>Ngày bắt đầu</th>
                            <th>Năm học</th>
                            <th>Tuần bắt đầu</th>
                            <th>Số tuần</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php $stt = 1;@endphp
                        @foreach($hk as $item)
                            <tr>
                                <td>{{ $stt++ }}</td>
                                <td>{{$item->ma_hoc_ky}}</td>
                                <td>{{$item->ten_hoc_ky}}</td>
                                <td>{{ \Carbon\Carbon::parse($item->ngay_bat_dau)->format('d-m-Y') }}</td>
                                <td>{{$item->nam_hoc}}</td>
                                <td>{{$item->tuan_bat_dau}}</td>
                                <td>{{$item->so_tuan}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- end body -->
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.btnDongBoHK').click(function () {
                $.ajax({
                    url: '{{action('App\Http\Controllers\admin\HocKyController@syncHocKy')}}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                        toastr.error("Thất bại");
                    }
                });
            });
        });
    </script>
@endsection
