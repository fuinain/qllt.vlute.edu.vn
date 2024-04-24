@extends('thuky.master')
@section('body')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý lịch trình / Biểu mẫu</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{action('App\Http\Controllers\thuky\DashBoardController@getViewDashBoard')}}"><i
                                    class="nav-icon fas fa-tachometer-alt"></i>Home</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{action('App\Http\Controllers\thuky\BieuMauController@getViewDanhSach')}}">Danh
                                sách biểu mẫu</a></li>
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
                    <button type="button"
                            class="btn btn-block bg-gradient-success btnExcel">Thêm mới biểu mẫu
                    </button>
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
                                    <label for="">Chọn file (*.xlsx)
                                        {{--                                        <a target="_blank" href="{{asset('excel/filemau.xlsx')}}">--}}
                                        {{--                                            File mẫu--}}
                                        {{--                                        </a>--}}
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

            <div class="card card-primary card-outline">
                <div class="card-body pad table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Biểu mẫu</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $index => $fileName)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td colspan="3"></td>
                                <td>
                                    <a href="{{ asset('excel/' . $fileName) }}" download="{{ $fileName }}">{{ $fileName }}</a>
                                </td>
                                <td>
                                    <a class="btnXoa" href="#" data-file="{{ $fileName }}"><i class="fa fa-fw fa-close"></i></a>
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
        $('.btnExcel').click(function () {
            $('.md2 .modal-title').text('Tải biểu mẫu');
            $('.md2').modal('show');
            $('.luuTT').click(function () {
                var fileInput = $('input[name="file-excel"]')[0].files[0];

                var formData = new FormData();
                formData.append('file-excel', fileInput);
                $.ajax({
                    url: '{{action('App\Http\Controllers\thuky\BieuMauController@uploadExcel')}}', // Thay đổi đường dẫn route mới
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

        $(document).ready(function () {
            $('.btnXoa').click(function (event) {
                event.preventDefault();
                var fileName = $(this).data('file');
                if (confirm('Bạn có chắc chắn muốn xoá biểu mẫu này không?')) {
                    $.ajax({
                        url: '{{ action('App\Http\Controllers\thuky\BieuMauController@deleteFile') }}',
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { fileName: fileName },
                        success: function (response) {
                            if (response.status === 200) {
                                alert(response.message);
                                location.reload();
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function () {
                            alert('Đã có lỗi xảy ra. Vui lòng thử lại sau.');
                        }
                    });
                }
            });
        });
    </script>
@endsection
