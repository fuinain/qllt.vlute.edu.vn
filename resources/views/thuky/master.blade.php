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
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                   aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            {{--full-screen--}}
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
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
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="align-content-center"
                     style="padding: 3.5px; align-items: center; display: flex; margin-left: 5px">
                    <img src="{{asset('dist/img/icon-user.png')}}" class="mr-1" style="height: 40px; width: 40px">
                    <div class="info text-white" style="font-size: 15px; padding: 5px;">Thư ký</div>
                </div>
            </div>

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
