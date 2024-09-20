@extends('giangvien.master')
@section('body')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Quản lý lịch trình / Lớp học phần thực hành / <b>{{$mhp}}</b></h1>
                </div><!-- /.col -->
                <div class="col-sm-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{action('App\Http\Controllers\giangvien\DashBoardController@getViewDashBoard')}}"><i class="nav-icon fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item active">
                            Chi tiết học phần
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- content-header -->

    <!-- body -->
    <div class="container-fluid mt-2">
        <div class="d-flex">
            <div class="mb-2 mr-1">
                <button class="btn btn-success bg-gradient-success btnExcel">Thêm bằng Excel</button>
            </div>
            <div class="mb-2 ml-1">
                <a href="{{route('giangvien.quanlyhocphan.chitiet.export-th',$mhp)}}" class="btn btn-success bg-gradient-success btnXuatExcel">Xuất biễu mẫu Excel</a>
            </div>
        </div>

        <!-- Model thêm file bằng excel -->
        <div class="modal fade md2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-bold"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Chọn file (*.xlsx) hoặc tải về
                                    <a target="_blank" href="{{asset('excel/filemau_hp_th.xlsx')}}">
                                        File mẫu
                                    </a>
                                </label>
                                <input accept=".xlsx" name="file-excel" type="file" class="form-control">
                                <br>
                                <p class="text-danger">Khi "Import danh sách", dữ liệu cũ sẽ được xóa khỏi hệ thống</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary luuTT">Tải lên</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-body pad table-responsive">
                <div class="row my-3">
                    <div class="col-xxl-3">
                        <div class="row align-items-center">
                            <div class="col-5 text-right">
                                <label class="m-0">Khoa: </label>
                            </div>
                            <div class="col-7">
                                <div class="text-red font-weight-bold">{{$hoc_phan->ma_don_vi}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <div class="row align-items-center">
                            <div class="col-4 text-right">
                                <label class="m-0">Tên học phần: </label>
                            </div>
                            <div class="col-8">
                                <div class="text-red font-weight-bold">{{$hoc_phan_main->ten_hoc_phan ?? $hoc_phan->ten_hoc_ky}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3">
                        <div class="row align-items-center">
                            <div class="col-8 text-right">
                                <label class="m-0">Tổng số giờ giảng: </label>
                            </div>
                            <div class="col-4">
                                <div class="text-red font-weight-bold">
                                    @if(str_contains($ten_hoc_phan_cut, 'BT') || str_contains($hoc_phan_main->ten_hoc_phan, 'CNTT'))
                                        <div class="text-red font-weight-bold">{{!empty($hoc_phan_main) ? ((int)$hoc_phan_main->tin_chi_thuc_hanh * 36) : 0}}</div>
                                    @else
                                        <div class="text-red font-weight-bold">{{!empty($hoc_phan_main) ? ((int)$hoc_phan_main->tin_chi_ly_thuyet * 18)  : 0}}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-xxl-3">
                        <div class="row align-items-center">
                            <div class="col-5 text-right">
                                <label class="m-0">Năm học: </label>
                            </div>
                            <div class="col-7">
                                <div class="text-red font-weight-bold">{{trim(explode(",",$hoc_phan->ten_hoc_ky)[1])}}, {{trim(explode(",",$hoc_phan->ten_hoc_ky)[0])}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <div class="row align-items-center">
                            <div class="col-4 text-right">
                                <label class="m-0">Cán bộ giảng dạy: </label>
                            </div>
                            <div class="col-8">
                                <div class="text-red font-weight-bold">{{$hoc_phan->ho_ten}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3">
                        <div class="row align-items-center">
                            <div class="col-8 text-right">
                                <label class="m-0">Số giờ giảng trực tiếp: </label>
                            </div>
                            <div class="col-4">
                                @if(str_contains($ten_hoc_phan_cut, 'BT') || str_contains($hoc_phan_main->ten_hoc_phan, 'CNTT'))
                                    <div class="text-red font-weight-bold">{{!empty($hoc_phan_main) ? $hoc_phan_main->tin_chi_thuc_hanh * 30  : 0}}</div>
                                @else
                                    <div class="text-red font-weight-bold">{{!empty($hoc_phan_main) ? $hoc_phan_main->tin_chi_ly_thuyet * 15  : 0}}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-xxl-3">
                        <div class="row align-items-center">
                            <div class="col-5 text-right">
                                <label class="m-0">Mã số học phần: </label>
                            </div>
                            <div class="col-7">
                                <div class="text-red font-weight-bold">{{$hoc_phan_main->ma_hoc_phan ?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <div class="row align-items-center">
                            <div class="col-4 text-right">
                                <label class="m-0">Cán bộ giảng dạy chính: </label>
                            </div>
                            <div class="col-6">
                                <input class="rounded w-100 form-control" type="text" name="ten_can_bo" value="{{array_key_exists(0,$lich_day) ? $lich_day[0]->gv_giang_day_chinh : ''}}">

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3">
                        <div class="row align-items-center">
                            <div class="col-8 text-right">
                                <label class="m-0">Số giờ giảng trực tuyến: </label>
                            </div>
                            <div class="col-4">
                                <div class="text-red font-weight-bold">
                                    @if(str_contains($ten_hoc_phan_cut, 'BT') || str_contains($hoc_phan_main->ten_hoc_phan, 'CNTT'))
                                        <div class="text-red font-weight-bold">{{!empty($hoc_phan_main) ? ((int)$hoc_phan_main->tin_chi_thuc_hanh * 6) : 0}}</div>
                                    @else
                                        <div class="text-red font-weight-bold">{{!empty($hoc_phan_main) ? ((int)$hoc_phan_main->tin_chi_ly_thuyet * 3)  : 0}}</div>
                                    @endif</div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('giangvien.quanlyhocphan.chitietth')}}" method="POST" class="form-group">
                    @csrf
                    <input class="rounded w-100 form-control" type="hidden" name="ma_hoc_phan" value="{{$mhp}}">
                    <input class="rounded w-100 form-control" type="hidden" name="ten_hoc_phan" value="{{$hoc_phan->ten_hoc_phan}}">
                    <input class="rounded w-100 form-control" type="hidden" name="id_hoc_phan" value="{{$hoc_phan_main->id_hoc_phan}}">
                    <input class="rounded w-100 form-control" type="hidden" name="id_don_vi" value="{{$hoc_phan->id_don_vi}}">
                    <input class="rounded w-100 form-control" type="hidden" name="id_hoc_ky" value="{{$hoc_phan->id_hoc_ky}}">
                    <input class="rounded w-100 form-control" type="hidden" name="id_giang_vien" value="{{$hoc_phan->id_giang_vien}}">
                    <table class="table-bordered table mt-5" style="table-layout: fixed">
                        <thead>
                           <tr>
                               <th style="width: 50px">TT</th>
                               <th style="width: 400px">TÊN ĐỀ MỤC TRONG CHƯƠNG TRÌNH</th>
                               <th style="width: 150px">SỐ GIỜ QUY ĐỊNH CỦA ĐỀ MỤC</th>
                               <th style="width: 150px">THỨ TỰ BÀI HỌC ĐỂ THỰC HIỆN</th>
                               <th style="width: 370px">NỘI DUNG VÀ YÊU CẦU CỦA BÀI HỌC</th>
                               <th style="width: 110px">THỜI GIAN THỰC HIỆN</th>
                               <th>GHI CHÚ</th>
                           </tr>
                        </thead>
                        <tbody>
                        @php
                            if (!function_exists('extractWeeks')) {
                                function extractWeeks($input) {
                                    $trimmedInput = trim(str_replace('Tuần học:', '', $input));
                                    $weeks = array_map('trim', explode('-', $trimmedInput));
                                    $weeks = array_filter($weeks, fn($week) => is_numeric($week));
                                    return array_values(array_map('intval', $weeks));
                                }
                            }
                            $weeks = extractWeeks($hoc_phan->tuan_hoc);
                        @endphp
                        @if(count($weeks) > 5)
                            @for($i=0;$i<10;$i++)
                                <tr>
                                    <td class="align-middle text-center">{{$i+1}}</td>
                                    <td class="p-1 w-25"><textarea class="h-100 py-2 border border-white form-control" style=" " rows="3" name="ten_de_muc[{{$i}}]">{{array_key_exists($i,$lich_day) ? $lich_day[$i]->ten_de_muc : ''}}</textarea></td>
                                    <td class="p-1 align-middle text-center"><input class="input-custom w-100 h-100 py-2" type="number" name="so_gio_quy_dinh[{{$i}}]" value="{{array_key_exists($i,$lich_day) ? $lich_day[$i]->so_gio_quy_dinh : ''}}"></td>
                                    <td class="p-1 align-middle text-center"><input class="input-custom w-100 h-100 py-2" type="number" name="thu_tu_bai_hoc[{{$i}}]" value="{{array_key_exists($i,$lich_day) ? $lich_day[$i]->thu_tu_bai_hoc : ''}}"></td>
                                    <td class="p-1 w-25"><textarea class="h-100 py-2 border border-white form-control" style=" " rows="3" name="noi_dung[{{$i}}]">{{array_key_exists($i,$lich_day) ? $lich_day[$i]->noi_dung : ''}}</textarea></td>
                                    <td class="align-middle text-center">{{$i > count($weeks) - 1 ? '' : $weeks[$i] }}</td>
                                    <td class="" style="width: 200px"><textarea class="h-100 py-2 border border-white form-control" style=" " rows="3" name="ghi_chu[{{$i}}]">{{array_key_exists($i,$lich_day) ? $lich_day[$i]->ghi_chu : ''}}</textarea></td>
                                </tr>
                            @endfor
                        @else
                            @for($i=0;$i<5;$i++)
                                <tr>
                                    <td class="align-middle text-center">{{$i+1}}</td>
                                    <td class="p-1 w-25"><textarea class="h-100 py-2 border border-white form-control" style=" " rows="3" name="ten_de_muc[{{$i}}]">{{array_key_exists($i,$lich_day) ? $lich_day[$i]->ten_de_muc : ''}}</textarea></td>
                                    <td class="p-1 align-middle text-center"><input class="input-custom w-100 h-100 py-2" type="number" name="so_gio_quy_dinh[{{$i}}]" value="{{array_key_exists($i,$lich_day) ? $lich_day[$i]->so_gio_quy_dinh : ''}}"></td>
                                    <td class="p-1 align-middle text-center"><input class="input-custom w-100 h-100 py-2" type="number" name="thu_tu_bai_hoc[{{$i}}]" value="{{array_key_exists($i,$lich_day) ? $lich_day[$i]->thu_tu_bai_hoc : ''}}"></td>
                                    <td class="p-1 w-25"><textarea class="h-100 py-2 border border-white form-control" style=" " rows="3" name="noi_dung[{{$i}}]">{{array_key_exists($i,$lich_day) ? $lich_day[$i]->noi_dung : ''}}</textarea></td>
                                    <td class="align-middle text-center">{{$i > count($weeks) - 1 ? '' : $weeks[$i] }}</td>
                                    <td class="" style="width: 200px"><textarea class="h-100 py-2 border border-white form-control" style=" " rows="3" name="ghi_chu[{{$i}}]">{{array_key_exists($i,$lich_day) ? $lich_day[$i]->ghi_chu : ''}}</textarea></td>
                                </tr>
                            @endfor
                        @endif
                        <tr>
                            <td colspan="2" class="text-right font-weight-bold"> Tổng số giờ đã nhập:</td>
                            <td colspan="1" class="text-danger font-weight-bold text-center tongGioTTiep"></td>
                            <td colspan="3"></td>
                            <td class="text-danger font-weight-bold text-center tongGioTTuyen"></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="pb-1" style="width: 150px">
                        <button type="submit" class="btn btn-block btn-success btnXacNhan">Xác Nhận Thêm</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end body -->
        @endsection
        @section('script')
            <script>
                // Sự kiện khi click vào nút Xác Nhận
                document.querySelector('.btnXacNhan').addEventListener('click', function (e) {
                    e.preventDefault(); // Ngăn chặn form submit ngay lập tức

                    let tinChiLyThuyet = {{$hoc_phan_main->tin_chi_thuc_hanh}};
                    let tongGioTTiep = parseFloat(document.querySelector('.tongGioTTiep').textContent) || 0;
                    let tongGioTTuyen = parseFloat(document.querySelector('.tongGioTTuyen').textContent) || 0;

                    // Kiểm tra các điều kiện dựa trên tin_chi_ly_thuyet
                    if (tinChiLyThuyet == 1) {
                        // Kiểm tra tổng LT phải bằng 15
                        if (tongGioTTiep !== 30) {
                            toastr.error('Số giờ quy định của đề mục phải bằng 30.');
                            return;
                        }
                        // Kiểm tra tổng ghi chú phải bằng 3
                        if (tongGioTTuyen !== 6) {
                            toastr.error('Tổng số giờ giảng trực tuyến phải bằng 6.');
                            return;
                        }
                    } else if (tinChiLyThuyet == 2) {
                        // Kiểm tra tổng LT phải bằng 30
                        if (tongGioTTiep !== 60) {
                            toastr.error('Số giờ quy định của đề mục phải bằng 60.');
                            return;
                        }
                        // Kiểm tra tổng ghi chú phải bằng 6
                        if (tongGioTTuyen !== 12) {
                            toastr.error('Tổng số giờ giảng trực tuyến phải bằng 12.');
                            return;
                        }
                    }

                    // Nếu vượt qua kiểm tra, submit form
                    this.closest('form').submit();
                });


                $(document).ready(function(){
                    $('textarea').on('blur', function(){
                        $(this).val($.trim($(this).val()));
                    });
                });
                $('.btnExcel').click(function () {
                    $('.md2 .modal-title').text('Import dữ liệu');
                    $('.md2').modal('show');
                    $('.luuTT').click(function () {
                        var fileInput = $('input[name="file-excel"]')[0].files[0];

                        var formData = new FormData();
                        formData.append('file', fileInput);
                        formData.append('ma_hoc_phan', '{{$mhp}}');
                        formData.append('id_hoc_phan', '{{$hoc_phan_main->id_hoc_phan}}');
                        $.ajax({
                            url: '{{route('giangvien.quanlyhocphan.chitiet.import-th')}}',
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

                function calculateTongGioLT() {
                    let totalSoGioQD = 0;
                    document.querySelectorAll('input[name^="so_gio_quy_dinh"]').forEach(input => {
                        totalSoGioQD += parseFloat(input.value) || 0; // Nếu giá trị không hợp lệ, lấy 0
                    });
                    document.querySelector('.tongGioTTiep').textContent = totalSoGioQD;
                }

                function calculateTongTietTH() {
                    let totalGhiChu = 0;

                    document.querySelectorAll('textarea[name^="ghi_chu"]').forEach(textarea => {
                        let value = textarea.value.match(/\d+/g); // Lấy tất cả các số trong chuỗi
                        if (value) {
                            totalGhiChu += parseInt(value[0]); // Chỉ lấy số đầu tiên
                        }
                    });

                    document.querySelector('.tongGioTTuyen').textContent = totalGhiChu;


                    // document.querySelector('.tongTietTH').textContent = totalGhiChu;
                }

                // Gắn sự kiện khi người dùng nhập liệu
                document.querySelectorAll('input[name^="so_gio_quy_dinh"]').forEach(input => {
                    input.addEventListener('input', calculateTongGioLT);
                });

                document.querySelectorAll('textarea[name^="ghi_chu"]').forEach(textarea => {
                    textarea.addEventListener('input', calculateTongTietTH);
                });

                // Gọi các hàm tính tổng khi trang được load (nếu có dữ liệu ban đầu)
                window.onload = function () {
                    calculateTongGioLT();
                    calculateTongTietTH();
                };
            </script>
        @endsection
        @section('style')
            <style>
                th {
                    text-align: center;
                    align-content: center;
                }

                /*textarea:focus {*/
                /*    outline: none;*/
                /*}*/

                .input-custom {
                    width: 100%;
                    height: 100%;
                    box-sizing: border-box;
                    padding: 0;
                    margin: 0;
                    border: none;
                }

                table tbody tr td input:focus {
                    outline: none;
                }

                table {
                    border-collapse: collapse;
                }

                textarea {
                    resize: none;
                    align-content:center;
                }

            </style>
@endsection
