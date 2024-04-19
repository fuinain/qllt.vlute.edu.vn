@extends('admin.master')
@section('body')
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body pad table-responsive">
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
@endsection
