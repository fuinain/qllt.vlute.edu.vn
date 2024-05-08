@extends('thuky.master')
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
                                href="{{ action('App\Http\Controllers\thuky\DashBoardController@getViewDashBoard') }}">Home</a>
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
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control tenGV" type="text" placeholder="Tên giảng viên">
                        <input type="hidden" id="giangVienId" name="giangVienId"> <!-- Input ẩn để lưu ID -->
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <select class="form-control hocKy">
                            @foreach($hk as $item)
                                <option value="{{$item->id}}">{{$item->ma_hoc_ky}} - {{$item->ten_hoc_ky}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-1">
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
                var giangVienId = $('#giangVienId').val(); // Lấy ID giảng viên từ input hidden
                var hocKyId = $('.hocKy').val(); // Lấy ID học kỳ từ select box

                $.ajax({
                    url: '{{ action('App\Http\Controllers\thuky\DashBoardController@syncTKBGiangVien') }}',
                    type: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        id_giang_vien: giangVienId,  // gửi ID giảng viên
                        id_hoc_ky: hocKyId  // gửi ID học kỳ
                    },
                    success: function (result) {
                        if (result.status === 200) {
                            $('#table-hp').empty(table);
                            if((result?.data?.length) == 0) {
                                return toastr.info('Không có dữ liệu')
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
                                        "" + item.ngay_hoc
                                    )
                                );
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

        $(document).ready(function () {
            $('.tenGV').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "{{action('App\Http\Controllers\admin\GiangVienController@searchGiangVien')}}",
                        type: 'GET',
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                minLength: 2,  // bắt đầu hiển thị gợi ý sau khi nhập 2 ký tự
                select: function (event, ui) {
                    $('.tenGV').val(ui.item.value); // hiển thị tên đã chọn trong input box
                    // Bạn có thể lưu ID vào một input ẩn nếu cần
                    $('#giangVienId').val(ui.item.id); // giả sử bạn có một input hidden có id là giangVienId
                    return false;
                }
            });
        });

    </script>
@endsection
