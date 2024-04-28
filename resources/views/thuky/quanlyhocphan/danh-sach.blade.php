@extends('thuky.master')
@section('body')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý lịch trình / Học phần</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{action('App\Http\Controllers\thuky\DashBoardController@getViewDashBoard')}}"><i
                                    class="nav-icon fas fa-tachometer-alt"></i>Home</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{action('App\Http\Controllers\thuky\HocPhanController@getViewDanhSach')}}">Danh
                                sách học phần</a></li>
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
                    <a href="{{action('App\Http\Controllers\thuky\HocPhanController@getViewThem')}}" type="button"
                       class="btn btn-block bg-gradient-success">Thêm mới</a>
                </div>
            </div>

            <div class="card card-primary card-outline">
                <div class="card-body pad table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã học phần</th>
                            <th>Tên học</th>
                            <th>Số TC</th>
                            <th>Tín chỉ LT</th>
                            <th>Tín chỉ TH</th>
                            <th></th>

                        </tr>
                        </thead>

                        <tbody>
                        @php $stt = 1;@endphp
                        @foreach($dshp as $item)
                            <tr>
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->ma_hoc_phan}}</td>
                                <td>{{ $item->ten_hoc_phan}}</td>
                                <td>{{ $item->so_tin_chi}}</td>
                                <td>{{ $item->tin_chi_ly_thuyet}}</td>
                                <td>{{ $item->tin_chi_thuc_hanh}}</td>
                                <td>
                                    <a href="{{action('App\Http\Controllers\thuky\HocPhanController@getViewCapNhat', ['id_hoc_phan'=>$item->id_hoc_phan])}}"><i class="nav-icon fas fa-edit"></i></a> |
                                    <a class="btnXoa" href="#" data="{{$item->id_hoc_phan}}"><i class="fa fa-fw fa-close"></i></a>
                                </td>
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
            $('.btnXoa').click(function () {
                if (!confirm("Chọn vào 'YES' để xác nhận xóa thông tin?\nSau khi xóa dữ liệu sẽ không thể phục hồi lại được.")) {
                    return;
                }

                var id = $(this).attr('data');
                $.ajax({
                    url: '{{action('App\Http\Controllers\thuky\HocPhanController@deleteHocPhan')}}',
                    type: "DELETE",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id_hoc_phan': id
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
                        toastr.error("Xoá thất bại");
                    }
                });
            });

        })
    </script>
@endsection
