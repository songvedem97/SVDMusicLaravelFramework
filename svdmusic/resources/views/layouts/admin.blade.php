<?php
$menu = config('menu');
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title')</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public/siteadmin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('public/siteadmin') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public/siteadmin') }}/dist/css/adminlte.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ url('public/siteadmin') }}/dist/css/style.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('home.index')}}" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                        @csrf
                    </form>

                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="{{ url('public/siteadmin') }}/dist/img/Logo-mini.png" alt="SVD Music"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text ">Admin Page</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    @if(Auth::check())
                    <img onerror="this.src='{{url('public/uploads/user/avatar_default.jpg')}}'"
                        src="{{url('public/uploads/user').'/'}}{{Auth::user()->image_user}}"
                            class="img-circle elevation-2" alt="User Image">
                    @else
                    <img onerror="this.src='{{url('public/uploads/user/avatar_default.jpg')}}'"
                        src="{{url('public/uploads/user').'/'}}"
                            class="img-circle elevation-2" alt="User Image">
                    @endif        
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Hi,
                        @if(Auth::check())
                        {{Auth::user()->name}}
                        @endif
                        </a>
                    </div>

                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        @foreach ($menu as $items)
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas {{$items['icon']}}"></i>
                                <p>
                                    {{$items['label']}}
                                    @if(@isset($items['items']))
                                    <i class="right fas fa-caret-left"></i>
                                    @endif
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(@isset($items['items']))
                                @foreach ($items['items'] as $item)
                                <li class="nav-item">
                                    <a href="{{ route($item['route']) }}" class="nav-link">
                                        <i class="fas {{$item['icon']}} nav-icon"></i>
                                        <p>{{$item['label']}}</p>
                                    </a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">
                                @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('error')}}
                                </div>
                                @endif
                                @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('success')}}
                                </div>
                                @endif
                                <div class="card-body">
                                    @yield('main')
                                </div>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('public/siteadmin') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('public/siteadmin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('public/siteadmin') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('public/siteadmin') }}/dist/js/adminlte.min.js"></script>
    @yield('css')
    @yield('js')
</body>

</html>