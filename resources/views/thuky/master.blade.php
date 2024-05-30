<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quản lý lịch trình</title>
    @include('library-css')
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/logovlute.png')}}" alt="AdminLTELogo" height="85"
             width="85">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link btnCollape" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" aria-expanded="false">
                            <img src="{{asset('dist/img/logovlute.png')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ session('HoTen') }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="{{asset('dist/img/logovlute.png')}}" class="img-circle" alt="User Image">
                                <p>
                                    {{ session('HoTen') }}
                                    <small>
                                        {{ session('Email') }}
                                    </small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="{{action('App\Http\Controllers\TaiKhoanController@dangxuat')}}"
                                       class="btn btn-default btn-flat">Đăng xuất</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
            <img src="{{asset('dist/img/logovlute.png')}}" alt="AdminLTE Logo" class="brand-image img-circle "
                 style="opacity: .8">
            <span class="brand-text font-weight-light">VLUTE</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-info"></i>
                            <p>
                                Quản lý thông tin
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{action('App\Http\Controllers\thuky\GiangVienController@getViewDanhSach')}}"
                                   class="nav-link">
                                    <p class="text-white">Giảng viên</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{action('App\Http\Controllers\thuky\HocKyController@getViewDanhSach')}}"
                                   class="nav-link ">
                                    <p class="text-white">Học kỳ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{action('App\Http\Controllers\thuky\HocPhanController@getViewDanhSach')}}"
                                   class="nav-link">
                                    <p class="text-white">Học phần</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('body')
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>

</div>
@include('library-js');
@yield('script')
</body>
</html>
