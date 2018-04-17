<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>@yield('title') | {{ config('app.name') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('public/manager') }}/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('public/manager') }}/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('public/manager') }}/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('public/manager') }}/css/demo.css" rel="stylesheet" />

    <style media="screen">
      .alert button.close {
        right: 20px;
        top: 50%;
        margin-top: -22px;
      }
    </style>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('public/manager') }}/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('public/manager') }}/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="">

        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Manager
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{ url('manager/profile') }}">
                        <i class="pe-7s-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('proposals/pending') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Pending proposals</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('proposals/blocked') }}">
                        <i class="pe-7s-attention"></i>
                        <p>Blocked proposals</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('account/user/all') }}">
                        <i class="pe-7s-users"></i>
                        <p>All users</p>
                    </a>
                </li>
                {{--<li>--}}
                    {{--<a href="#">--}}
                        {{--<i class="pe-7s-bell"></i>--}}
                        {{--<p>Notifications</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="active-pro">--}}
                    {{--<a href="#">--}}
                        {{--<i class="pe-7s-tools"></i>--}}
                        {{--<p>Settings</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">


                    <ul class="nav navbar-nav navbar-right">
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                                {{--<i class="fa fa-globe"></i>--}}
                                {{--<b class="caret hidden-sm hidden-xs"></b>--}}
                                {{--<span class="notification hidden-sm hidden-xs">5</span>--}}
                                {{--<p class="hidden-lg hidden-md">--}}
                                    {{--5 Notifications--}}
                                    {{--<b class="caret"></b>--}}
                                {{--</p>--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li><a href="#">Notification 1</a></li>--}}
                                {{--<li><a href="#">Notification 2</a></li>--}}
                                {{--<li><a href="#">Notification 3</a></li>--}}
                                {{--<li><a href="#">Notification 4</a></li>--}}
                                {{--<li><a href="#">Another notification</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="">--}}
                                {{--<p>Manager</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                                <p>Log out</p>
                            </a>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none">{{ csrf_field() }}</form>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    @if( session('status') )
                      <div class="alert alert-dismissible alert-warning alert-bottom">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session('status') }}
                      </div>
                    @endif

                    @yield('content')

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    YouDecide &copy; <span class="text-warning">Rebel Geeks</span>
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="{{ asset('public/manager') }}/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="{{ asset('public/manager') }}/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{ asset('public/manager') }}/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('public/manager') }}/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{ asset('public/manager') }}/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="{{ asset('public/manager') }}/js/demo.js"></script>

<script src="{{ asset('public/js/tinymce/tinymce.min.js') }}"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    menubar: false,
    branding: false
  });
</script>

<script type="text/javascript" src="{{ asset('public/js/jquery.profanityfilter.js') }}"></script>
<script type="text/javascript">
  $(document).profanityFilter({
    externalSwears: 'public/js/swearWords.json'
  });
</script>


</html>
