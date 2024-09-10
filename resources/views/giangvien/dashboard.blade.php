@extends('giangvien.master')
@section('body')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">QUẢN LÝ LỊCH TRÌNH</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{ action('App\Http\Controllers\giangvien\DashBoardController@getViewDashBoard') }}">Home</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- content-header -->

    <!-- body -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <h4>Tra cứu lịch trình của giảng viên</h4>
                <div class="col-10">
                    <div class="form-group">
                        <select class="form-control hocKy">
                            @foreach($hk as $item)
                                <option value="{{$item->id}}">{{$item->ma_hoc_ky}} - {{$item->ten_hoc_ky}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <button type="button" class="btn btn-block btn-outline-success btnTimKiem">Tìm kiếm</button>
                    </div>
                </div>
            </div>
            <div class="card card-primary table-responsive" id="table-hp">

            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.btnTimKiem').click(function (event) {
                event.preventDefault();
                var giangVienId = {{$id_giang_vien}};
                var hocKyId = $('.hocKy').val(); // Lấy ID học kỳ từ select box

                $.ajax({
                    url: '{{ action('App\Http\Controllers\admin\DashBoardController@syncTKBGiangVien') }}',
                    type: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        id_giang_vien: giangVienId,  // gửi ID giảng viên
                        id_hoc_ky: hocKyId  // gửi ID học kỳ
                    },
                    success: function (result) {
                        if (result.status === 200) {
                            $('#table-hp').empty();

                            if((result?.data?.length) == 0) {
                                return toastr.info('Không có dữ liệu');
                            }

                            var table = $('<table>').addClass('table table-hover text-nowrap');

                            // Create the table header
                            var header = $('<thead>').append(
                                $('<tr>').append(
                                    $('<th class="ngay">').text('Ngày'),
                                    $('<th class="hocphan">').text('Lớp học phần')
                                )
                            );

                            // Append the header to the table
                            table.append(header);

                            // Create the table body
                            var tbody = $('<tbody>');

                            // Populate the table body with data
                            result?.data?.forEach(function(item) {
                                var row = $('<tr>').append(
                                    $('<td>').text(item.thu),
                                    $('<td>').html(
                                        "<strong>" + item.ten_hoc_phan + "</strong><br>" +
                                        item.ma_hoc_phan + "<br>" +
                                        "" + item.giang_vien + "<br>" +
                                        "" + item.phong + "<br>" +
                                        "" + item.tuan_hoc + "<br>" +
                                        "" + (item.ngay_hoc ?  item.ngay_hoc : "")
                                    )
                                );

                                // Kiểm tra nếu tên học phần chứa "Đồ án" hoặc "Khóa luận"
                                if (item.ten_hoc_phan.includes("Đồ án") || item.ten_hoc_phan.includes("Khóa luận")) {
                                    // Không gắn sự kiện click nếu chứa "Đồ án" hoặc "Khóa luận"
                                    row.css('background-color', '#f5f5f5');  // Đổi màu hàng nếu muốn
                                } else {
                                    // Gắn sự kiện click cho các học phần không chứa "Đồ án" hoặc "Khóa luận"
                                    row.on('click', function() {
                                        rowClickHandler(item.ma_hoc_phan);
                                    });
                                }

                                tbody.append(row);
                            });

                            // Append the body to the table
                            table.append(tbody);

                            // Append the table to the div with id 'table-hp'
                            $('#table-hp').append(table);
                            toastr.success('Thành công');
                        } else {
                            toastr.error(result.message);
                        }
                    },
                    error: function (error) {
                        toastr.error("Tìm thất bại");
                    }
                });
            });
        });


        function rowClickHandler(maHocPhan) {
            // Implement your action here
            window.location.href = `/auth/giangvien/quanlyhocphan/chitiet/${maHocPhan}`;
        }

    </script>
@endsection
