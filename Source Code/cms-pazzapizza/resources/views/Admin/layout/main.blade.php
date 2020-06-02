<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pazza Pizza - {{ $title }}</title>
        <!-- Icon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{url('Admin/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{url('Admin/dist/css/adminlte.min.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="{{url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}" rel="stylesheet">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{url('Admin/plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{url('Admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="{{url('Admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
        <!-- daterange picker -->
        <link rel="stylesheet" href="{{url('Admin/plugins/daterangepicker/daterangepicker.css')}}">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="{{url('Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="{{url('Admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{url('Admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <style>
            .card-header{
            padding: 1.5em !important;
            }
        </style>
        @yield('custom_css')
    </head>
    <!--
        BODY TAG OPTIONS:
        =================
        Apply one or more of the following classes to to the body tag
        to get the desired effect
        |---------------------------------------------------------|
        |LAYOUT OPTIONS | sidebar-collapse                        |
        |               | sidebar-mini                            |
        |---------------------------------------------------------|
        -->
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('home') }}" class="nav-link">Back to Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('account.logout') }}" class="nav-link">Logout</a>
                    </li>
                </ul>
                <!-- Right navbar links -->
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="brand-link">
                <img src="{{ asset('images/cms/logo_without_text.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"> Pazza Pizza </span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ $user->photo_profile }}" onerror="if (this.src != '{{ asset('/images/cms/default_avatar.jpg') }}') this.src = '{{ asset('/images/cms/default_avatar.jpg') }}';" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="javascript:void(0)" class="d-block">{{ $user->firstname }} {{ $user->lastname }}</a>
                        </div>
                    </div>
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                            <li class="nav-item has-treeview">
                                <a href="{{ route('panel') }}" class="nav-link @if($nav_menu == 'sales') active @endif ">
                                    <i class="nav-icon fas fa-truck-loading"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview @if($nav_menu == 'product_lists' || $nav_menu == 'product_add') open @endif">
                                <a href="javascript:void(0)" class="nav-link @if($nav_menu == 'product_lists' || $nav_menu == 'product_add') active @endif ">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>
                                        Products
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview @if($nav_menu == 'product_lists' || $nav_menu == 'product_add') d-block @endif">
                                    <li class="nav-item">
                                        <a href="{{ route('panel.product') }}" class="nav-link @if($nav_menu == 'product_lists') active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Lists</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('panel.product.add') }}" class="nav-link @if($nav_menu == 'product_add') active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add New Product</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview @if($nav_menu == 'user_lists' || $nav_menu == 'user_add') open @endif">
                                <a href="javascript:void(0)" class="nav-link @if($nav_menu == 'user_lists' || $nav_menu == 'user_add') active @endif ">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        User Management
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview @if($nav_menu == 'user_lists' || $nav_menu == 'user_add') d-block @endif">
                                    <li class="nav-item">
                                        <a href="{{ route('panel.user') }}" class="nav-link @if($nav_menu == 'user_lists') active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Lists</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('panel.user.create') }}" class="nav-link @if($nav_menu == 'user_add') active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add New User</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            @yield('content-wrapper')
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
            <!-- Main Footer -->
        </div>
        <!-- ./wrapper -->
        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{url('Admin/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{url('Admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- OPTIONAL SCRIPTS -->
        <script src="{{url('Admin/plugins/chart.js/Chart.min.js')}}"></script>
        <script src="{{url('Admin/dist/js/demo.js')}}"></script>
        <script src="{{url('Admin/dist/js/pages/dashboard3.js')}}"></script>
        <!-- Select2 -->
        <script src="{{url('Admin/plugins/select2/js/select2.full.min.js')}}"></script>
        <!-- Bootstrap4 Duallistbox -->
        <script src="{{url('Admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
        <!-- InputMask -->
        <script src="{{url('Admin/plugins/moment/moment.min.js')}}"></script>
        <script src="{{url('Admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
        <!-- date-range-picker -->
        <script src="{{url('Admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- bootstrap color picker -->
        <script src="{{url('Admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{url('Admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Bootstrap Switch -->
        <script src="{{url('Admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{url('Admin/dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{url('Admin/dist/js/demo.js')}}"></script>
        @yield('custom_js')
        <!-- Page script -->
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()
                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })
                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('dd/mm/yyyy', {
                    'placeholder': 'dd/mm/yyyy'
                })
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
                $('[data-mask]').inputmask()
                //Date range picker
                $('#reservationdate').datetimepicker({
                    format: 'L'
                });
                //Date range picker
                $('#reservation').daterangepicker()
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'MM/DD/YYYY hh:mm A'
                    }
                })
                //Date range as a button
                $('#daterange-btn').daterangepicker({
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        },
                        startDate: moment().subtract(29, 'days'),
                        endDate: moment()
                    },
                    function(start, end) {
                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                    }
                )
                //Timepicker
                $('#timepicker').datetimepicker({
                    format: 'LT'
                })
                //Bootstrap Duallistbox
                $('.duallistbox').bootstrapDualListbox()
                //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()
                $('.my-colorpicker2').on('colorpickerChange', function(event) {
                    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                });
                $("input[data-bootstrap-switch]").each(function() {
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                });
            })
        </script>
    </body>
</html>