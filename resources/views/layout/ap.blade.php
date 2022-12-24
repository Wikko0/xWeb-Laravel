<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel  | XWeb</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('../plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('../plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('../plugins/jqvmap/jqvmap.min.css')}}">
    <!-- DataPicker -->
    <link rel="stylesheet" href="{{asset('../plugins/daterangepicker/daterangepicker.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('../dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('../plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('../plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('../plugins/summernote/summernote-bs4.min.css')}}">
    <!-- Weekday -->
    <link rel="stylesheet" href="{{asset('../dist/css/slimselect.min.css')}}">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/adminpanel" class="nav-link">Home</a>
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
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
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
            </li>



            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src="../dist/img/AdminLTELogo.png" alt="XWEB Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Go to Website</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('/dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    @foreach($adminname as $name)

                        <a href="#" class="d-block">{{ $name->admin }}</a>

                    @endforeach
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="/adminpanel" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Home

                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Server management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/adminpanel/panel" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Admin Data</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/adminpanel/seo" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SEO</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Website management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/adminpanel/announce" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Announce Settings</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/adminpanel/download" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Download Settings</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/adminpanel/event" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Event Settings</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/adminpanel/boss" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Boss Settings</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/adminpanel/slider" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Slider Settings</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                User management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/adminpanel/reset" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Reset Settings</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/adminpanel/grand-reset" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Grand Reset Settings</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/adminpanel/addstats" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Stats Settings</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/adminpanel/pkclear" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>PK Clear Settings</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/adminpanel/rename" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Rename Settings</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/adminpanel/resetstats" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ResetStats Settings</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">Add Systems</li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Add News
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/adminpanel/news" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add News</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/adminpanel/events" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Event News</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/adminpanel/updates" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Update News</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-plus-square"></i>
                            <p>
                                Hall Of Fame
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/adminpanel/hof" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hall of Fame</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/adminpanel/hofswitch" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hall of Fame Switch</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">Payment System</li>
                    <li class="nav-item">
                        <a href="/adminpanel/paypal" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Paypal Manage</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; {{ date('Y') }} <a href="/">XWEB</a>.</strong>
        All rights reserved.

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>

@yield('scripts')
</body>
</html>
