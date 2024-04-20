@extends('admin.master')
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
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
                    <h4>Tra cứu lịch trình của giảng viên</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Tên giảng viên">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <button type="button" class="btn btn-block btn-outline-success">Tìm kiếm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
