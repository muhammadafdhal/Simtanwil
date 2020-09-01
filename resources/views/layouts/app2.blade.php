<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.bootstrap.min.css">
    <link href="{{ asset('system/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('system/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('system/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{ asset('system/css/styles.css')}}" rel="stylesheet">
    <link href="{{ asset('system/js/select2/css/select2.css')}}" rel="stylesheet">
    

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                    </a>
                                    <div class="message-body"><small class="pull-right">3 mins ago</small>
                                        <a href="#"><strong>John Doe</strong> commented on <strong>your
                                                photo</strong>.</a>
                                        <br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                    </a>
                                    <div class="message-body"><small class="pull-right">1 hour ago</small>
                                        <a href="#">New message from <strong>Jane Doe</strong>.</a>
                                        <br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="all-button"><a href="#">
                                        <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                                    </a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <em class="fa fa-bell"></em><span class="label label-info">5</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li><a href="#">
                                    <div><em class="fa fa-envelope"></em> 1 New Message
                                        <span class="pull-right text-muted small">3 mins ago</span></div>
                                </a></li>
                            <li class="divider"></li>
                            <li><a href="#">
                                    <div><em class="fa fa-heart"></em> 12 New Likes
                                        <span class="pull-right text-muted small">4 mins ago</span></div>
                                </a></li>
                            <li class="divider"></li>
                            <li><a href="#">
                                    <div><em class="fa fa-user"></em> 5 New Followers
                                        <span class="pull-right text-muted small">4 mins ago</span></div>
                                </a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown"
                            href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <em class="fa fa-power-off"></em>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">{{Auth::user()->name}}</div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
        <ul class="nav menu">
            <li class="@yield('status-home')"><a href="/"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class="@yield('status-form-arsip')"><a href="{{ url('arsip/tambah')}}"><em
                        class="fa fa-file-text">&nbsp;</em> Form Arsip Tanah</a></li>
            <li class="@yield('status-arsip')"><a href="{{ url('arsip')}}"><em class="fa fa-archive">&nbsp;</em> Data
                    Arsip Tanah</a></li>
            <li class="@yield('status-laporan')"><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em>
                    Laporan</a></li>
            <li class="parent @yield('status-dropdown')"><a data-toggle="collapse" href="#sub-item-1">
                    <em class="fa fa-map-marker">&nbsp;</em> Wilayah <span data-toggle="collapse" href="#sub-item-1"
                        class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse @yield('status-wilayah')" id="sub-item-1">
                    <li class="@yield('status-provinsi')"><a href="{{ url('provinsi')}}">
                            <span class="fa fa-arrow-right">&nbsp;</span> Provinsi
                        </a></li>
                    <li class="@yield('status-kabkota')"><a class="" href="{{ url('kabkota')}}">
                            <span class="fa fa-arrow-right">&nbsp;</span> Kabkota
                        </a></li>
                    <li class="@yield('status-kecamatan')"><a class="" href="{{ url('kecamatan')}}">
                            <span class="fa fa-arrow-right">&nbsp;</span> Kecamatan
                        </a></li>
                </ul>
            </li>
            <li class="@yield('status-user')"><a href="login.html"><em class="fa fa-users">&nbsp;</em> Manajemen
                    User</a></li>
        </ul>
    </div>
    <!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


        @yield('content')
        <div class="col-sm-12">
            <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
        </div>
    </div>
    <!--/.main-->

    <script src="{{ asset('system/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{ asset('system/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('system/js/chart.min.js')}}"></script>
    <script src="{{ asset('system/js/chart-data.js')}}"></script>
    <script src="{{ asset('system/js/easypiechart.js')}}"></script>
    <script src="{{ asset('system/js/easypiechart-data.js')}}"></script>
    <script src="{{ asset('system/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('system/js/custom.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('system/js/dropdown.js')}}"></script>
    <script src="{{ asset('system/js/select2/js/select2.js')}}"></script>
    <script>
        window.onload = function () {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true,
                scaleLineColor: "rgba(0,0,0,.2)",
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleFontColor: "#c5c7cc"
            });
        };

    </script>

    {{-- data table --}}
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
        });

    </script>
    
    <script>
        $(document).ready(function() { $("#e1").select2(); });
        $(document).ready(function() { $("#e2").select2(); });
        $(document).ready(function() { $("#e3").select2(); });
    </script>

</body>

</html>
