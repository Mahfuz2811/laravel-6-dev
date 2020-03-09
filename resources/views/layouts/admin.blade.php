<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Inventory System') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin/assets/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/bower_components/datatables.net-bs/css/buttons.dataTables.min.css') }}">
    <!-- <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css'> -->
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('admin/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/assets/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/assets/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/dist/css/custom.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('admin/assets/bower_components/morris.js/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('admin/assets/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <style>
        input[readonly] {
            cursor: text;
            background-color: #fff !important;
        }
        .required:after { content:" *"; color: red; }
        .box-title{
            font-weight: 700 !important;;
            color: #dd4b39;
            font-size: 30px !important;
            text-align: center;
        }
        .table-bordered>tfoot>tr>td {
            vertical-align: middle;
        }

        .error{
            color: red;
        }
    </style>

    @yield('style')


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('/admin/dashboard') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>Inventory</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"></span><img style="margin-left: -15px; margin-top: -3px;" src="{{ url('admin/logo.png') }}" alt="Inventory">
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="assets/#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="assets/#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- <img src="{{ asset('admin/assets/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image"> -->
                            <span class="hidden-xs">Name</span>
                        </a>
                        <ul class="dropdown-menu" style="width: 100% !important;">
                            <!-- User image -->
                            <li class="">
                                <div class="pull-left">
                                    <a href="{{ route('logout') }}" class="btn btn-default"
                                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                        Sign out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="pull-right">
                                    <a href="" class="btn btn-default">
                                        Profile
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    @include('lib/sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
    @yield('content')
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2019 <a href="{{ url('/') }}">Inventory</a>.</strong> All rights
        reserved. <a href="javascript::void(0)">Sheba Technologies Ltd.</a>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('admin/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/jquery/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/jquery/dist/additional-methods.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/assets/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('admin/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- DataTables -->

<!-- Custom js -->
<script src="{{ asset('js/base.url.js') }}"></script>

<script src="{{ asset('admin/assets/bower_components/datatables.net/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/datatables.net/buttons/buttons.flash.min.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/datatables.net/buttons/jszip.min.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/datatables.net/buttons/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/datatables.net/buttons/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/datatables.net/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/datatables.net/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/datatables.net/buttons/buttons.colVis.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('admin/assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Morris.js charts -->

<!-- bootstrap datepicker -->
<script src="{{ asset('admin/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('admin/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/assets/dist/js/adminlte.min.js') }}"></script>

<!-- CK Editor -->
<!-- <script src="{{ asset('admin/assets/bower_components/ckeditor/ckeditor.js') }}"></script> -->



<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<script src="{{ asset('admin/assets/bower_components/sweetalert/sweetalert.min.js') }}"></script>

@yield('script')

<script>
    $.widget.bridge('uibutton', $.ui.button);
    $('.select2').select2().on('change', function() {
        $(this).valid();
    });

    //Date picker
    $('.datepicker').datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true
    })
</script>
</body>
</html>
