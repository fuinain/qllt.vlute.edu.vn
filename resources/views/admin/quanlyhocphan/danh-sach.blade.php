@extends('admin.master')
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
                        <li class="breadcrumb-item"><a href="{{action('App\Http\Controllers\admin\DashBoardController@getViewDashBoard')}}"><i
                                    class="nav-icon fas fa-tachometer-alt"></i>Home</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{action('App\Http\Controllers\admin\HocPhanController@getViewDanhSach')}}">Danh
                                sách học phần</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Model thêm file bằng excel -->
    <div class="modal fade md2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-bold"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Chọn file (*.xlsx) hoặc tải về
                                <a target="_blank" href="{{asset('excel/import_hocphan.xlsx')}}">
                                    File mẫu
                                </a>
                            </label>
                            <input accept=".xlsx" name="file-excel" type="file" class="form-control">
                            <br>
                            {{--                                    <p class="text-danger">Khi "Import danh sách", dữ liệu cũ sẽ được xóa khỏi hệ thống</p>--}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary luuTT">Tải lên</button>
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
                    <a href="{{action('App\Http\Controllers\admin\HocPhanController@getViewThem')}}" type="button"
                       class="btn btn-block bg-gradient-success">Thêm mới</a>
                </div>
                <div class="pb-1 mx-2">
                    <button
                        class="btn btn-success bg-gradient-success btnExcel">Thêm bằng Excel</button>
                </div>
            </div>

            <div class="card card-primary card-outline">
                <div class="card-body pad table-responsive">
                    <table id="hocPhanTable" class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Mã học phần</th>
                            <th>Tên học phần</th>
                            <th class="text-center">Số TC</th>
                            <th class="text-center">Tín chỉ LT</th>
                            <th class="text-center">Tín chỉ TH</th>
                            <th></th>

                        </tr>
                        </thead>

                        <tbody>
                        @php $stt = 1;@endphp
                        @foreach($dshp as $item)
                            <tr>
                                <td class="text-center">{{ $stt++ }}</td>
                                <td class="text-center">{{ $item->ma_hoc_phan}}</td>
                                <td>{{ $item->ten_hoc_phan}}</td>
                                <td class="text-center">{{ $item->so_tin_chi}}</td>
                                <td class="text-center">{{ $item->tin_chi_ly_thuyet}}</td>
                                <td class="text-center">{{ $item->tin_chi_thuc_hanh}}</td>
                                <td class="text-center">
                                    <a href="{{action('App\Http\Controllers\admin\HocPhanController@getViewCapNhat', ['id_hoc_phan'=>$item->id_hoc_phan])}}"><i class="nav-icon fas fa-edit"></i></a> |
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
        var table = $('#hocPhanTable').DataTable();

        $(document).ready(function () {
            $('.btnXoa').click(function () {
                if (!confirm("Chọn vào 'YES' để xác nhận xóa thông tin?\nSau khi xóa dữ liệu sẽ không thể phục hồi lại được.")) {
                    return;
                }

                var id = $(this).attr('data');
                $.ajax({
                    url: '{{action('App\Http\Controllers\admin\HocPhanController@deleteHocPhan')}}',
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

        $('.btnExcel').click(function(){
            $('.md2 .modal-title').text('Thêm học phần bằng excel');
            $('.md2').modal('show');
            $('.luuTT').click(function(){
                var fileInput = $('input[name="file-excel"]')[0].files[0];

                var formData = new FormData();
                formData.append('file-excel', fileInput);
                $.ajax({
                    url: '{{ action('App\Http\Controllers\admin\HocPhanController@postImportHocPhan') }}',
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    contentType: false,
                    processData: false,
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
                });

            })
        })
    </script>
@endsection
