<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="JOTracking System of Inteo-Opamin Accounting">
    <meta name="author" content="DavWorkxAsia Solutions">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('plugins/images/favicon.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JOTracking') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{url('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{url('plugins/bower_components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{url('plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{url('plugins/bower_components/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{url('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{url('css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{url('css/colors/default.css')}}" id="theme" rel="stylesheet">

</head>
<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="{{url('/home')}}">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="{{url('plugins/images/admin-logo.png')}}" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="../plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="{{url('plugins/images/admin-text.png')}}" alt="home" class="dark-logo" /><!--This is light logo text--><img src="../plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">

                    @auth
                    <li>
                        <a class="profile-pic" href="#"> <img src="{{url('plugins/images/users/varun.jpg')}}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b></a>
                    </li>
                    @else
                    <li>
                    <div class="center">
                        <a href="{{url('register')}}" class="btn btn-danger btn-block waves-effect waves-light">Register</a>
                    </div>

                    </li>
                    <!-- <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li> -->

                    @endauth
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                @auth
                    <li style="padding: 70px 0 0;">
                        <a href="{{url('/home')}}" class="waves-effect {{$_SERVER['REQUEST_URI'] == '/home' ? ' active' : ''}}"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('/profile') }}" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Profile</a>
                    </li>
                    <li>
                        <a href="{{route('superadmin.users.index')}}" class="waves-effect {{$_SERVER['REQUEST_URI'] == '/superadmin/users' ? ' active' : ''}}"><i class="fa fa-users fa-fw" aria-hidden="true" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i>Manage Users</a>

                    
                    </li>
                    <li>
                    <div class="collapse" id="collapseExample">
  <div class="card card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div>
</li>
                    <li>
                        <a href="{{ url('/clients') }}" class="waves-effect {{$_SERVER['REQUEST_URI'] == '/clients' ? ' active' : ''}}"><i class="fa fa-github-alt fa-fw" aria-hidden="true"></i>Manage Clients</a>
                    </li>
                    <li>
                        <a href="{{ url('/jo') }}" class="waves-effect {{$_SERVER['REQUEST_URI'] == '/jo' ? ' active' : ''}}"><i class="fa fa-stack-overflow fa-fw" aria-hidden="true"></i>Manage Job Orders</a>
                    </li>
                    <li>
                        <a href="{{ url('/tasks') }}" class="waves-effect {{$_SERVER['REQUEST_URI'] == '/tasks' ? ' active' : ''}}"><i class="fa fa-bars fa-fw" aria-hidden="true"></i>Manage Tasks</a>
                    </li>
                    <li>
                        <a href="{{ url('/mytasks') }}" class="waves-effect {{$_SERVER['REQUEST_URI'] == '/mytasks' ? ' active' : ''}}"><i class="fa fa-tasks fa-fw" aria-hidden="true"></i>My Tasks</a>
                    </li>
                    <li>
                        <a href="{{ url('/billing') }}" class="waves-effect {{$_SERVER['REQUEST_URI'] == '/billing' ? ' active' : ''}}"><i class="fa fa-credit-card-alt fa-fw" aria-hidden="true"></i>Manage Billing</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="waves-effect" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out fa-fw" aria-hidden="true">
                        </i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </li>

                @endauth
                </ul>
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">

                @yield('content')

            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2019 &copy; JOTracking System brought to you by wrappixel.com & DavworkxAsia Solutions </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  
    <script src="{{url('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{url('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{url('js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{url('js/waves.js')}}"></script>
    <!--Counter js -->
    <script src="{{url('plugins/bower_components/waypoints/lib/jquery.waypoints.js')}}"></script>
    <script src="{{url('plugins/bower_components/counterup/jquery.counterup.min.js')}}"></script>
    <!-- chartist chart -->
    <script src="{{url('plugins/bower_components/chartist-js/dist/chartist.min.js')}}"></script>
    <script src="{{url('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="{{url('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{url('js/custom.min.js')}}"></script>
    <script src="{{url('js/dashboard1.js')}}"></script>
    <script src="{{url('plugins/bower_components/toast-master/js/jquery.toast.js')}}"></script>
</body>

</html>
