<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <style type="text/css">
        .range-dtp {
            position: relative;
        }

        .range-dtp i {
            position: absolute;
            bottom: 10px;
            right: 10px;
            top: auto;
            cursor: pointer;
        }

    </style>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- Bootstrap Styles-->
    <link href="{{ asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{ asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{ asset('assets/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{ asset('assets/css/custom-styles.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/js/select2/css/select2.css')}}" rel="stylesheet">
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="{{ asset('assets/js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/dateRange/css/daterangepicker.css') }}" type="text/css">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Simtanwil</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>
                    Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        {{-- <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i> --}}
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>
                                Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">


                    @if (Auth::user()->level == "Pegawai" || Auth::user()->level == "Admin")

                    <li>
                        <a class="@yield('status-home')" href="/"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li>
                        <a class="@yield('status-form-arsip')" href="{{ url('arsip/tambah')}}"><i
                                class="fa fa-desktop"></i> Form Surat Tanah Wilayah</a>
                    </li>

                    <li>
                        <a class="@yield('status-arsip')" href="{{ url('arsip')}}"><i class="fa fa-bar-chart-o"></i>Data
                            Surat Tanah Wilayah</a>
                    </li>

                    <li class="@yield('status-dropdown')">
                        <a href="#"><i class="fa fa-sitemap"></i> Wilayah<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level @yield('status-wilayah')">
                            <li class="@yield('status-provinsi')">
                                <a href="{{ url('provinsi')}}">Provinsi</a>
                            </li>
                            <li class="@yield('status-kabkota')">
                                <a href="{{ url('kabkota')}}">KabKota</a>
                            </li>
                            <li class="@yield('status-kecamatan')">
                                <a href="{{ url('kecamatan')}}">Kecamatan</a>
                            </li>
                            <li class="@yield('status-keldes')">
                                <a href="{{ url('keldes')}}">Kelurahan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="@yield('status-user')" href="{{ url('pengguna')}}"><i class="fa fa-users"></i>
                            Manajemen User</a>
                    </li>
                    @endif

                    @if (Auth::user()->level == "Pimpinan")
                    <li>
                        <a class="@yield('status-home')" href="/"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="@yield('status-laporan')" href="{{ url('rekap-tanah')}}"><i class="fa fa-qrcode"></i>
                            Laporan</a>
                    </li>


                    @endif
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                @yield('content')
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->


    <!-- jQuery Js -->
    <script src="{{ asset('assets/js/jquery-1.10.2.js')}}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Metis Menu Js -->
    <script src="{{ asset('assets/js/jquery.metisMenu.js')}}"></script>
    <!-- Morris Chart Js -->
    <script src="{{ asset('assets/js/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{ asset('assets/js/morris/morris.js')}}"></script>


    <!-- Custom Js -->
    <script src="{{ asset('assets/js/dropdown.js')}}"></script>
    <script src="{{ asset('assets/js/select2/js/select2.js')}}"></script>
    <!-- js untuk jquery -->
    <script src="{{ asset('assets/dateRange/js/jquery-1.11.2.min.js') }}"></script>
    <!-- js untuk bootstrap -->
    <script src="{{ asset('assets/dateRange/js/bootstrap.js') }}"></script>
    <!-- js untuk moment -->
    <script src="{{ asset('assets/dateRange/js/moment.js') }}"></script>
    <!-- js untuk daterangepicker -->
    <script src="{{ asset('assets/dateRange/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('assets/js/dataTables/dataTables.bootstrap.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });

    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('.range-dtp i').click(function () {
                $(this).parent().find('input').click();
            });

            $('#range-tanggal').daterangepicker({
                autoUpdateInput: false,
                format: 'DD/MM/YYYY',
                useCurrent: false,
                "showDropdowns": true,
                "autoApply": true,
            }, function (start, end, label) {
                $('#range-tanggal').val(start.format('DD/MM/YYYY') + " - " + end.format('DD/MM/YYYY'))
            });

        });

    </script>



    {{-- js select2 --}}
    <script>
        $(document).ready(function () {
            $("#e1").select2();
        });
        $(document).ready(function () {
            $("#e2").select2();
        });
        $(document).ready(function () {
            $("#e3").select2();
        });

    </script>

    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });

    </script>

    <script>
        $(document).on('ajaxComplete ready', function () {
            $('.modalMd').off('click').on('click', function () {
                $('#modalMdContent').load($(this).attr('value'));
            });
        });

    </script>


    <script src="{{ asset('assets/js/custom-scripts.js')}}"></script>

</body>

</html>
