<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jalawren.website - borealis api</title>

    <link href="/css/app.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Benda-Lutz</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>

                <li><a href="/materials">Materials</a></li>
                <li><a href="/files">files</a></li>
                {{--<li><a href="/customers">Customers</a></li>--}}
                {{--<li><a href="/printers">Printers</a></li>--}}
                {{--<li><a href="/materials/import">MM_IMPORT</a></li>--}}
                {{--<li><a href="/prices">CUSTPRICE</a></li>--}}
                {{--<li><a href="/core">CORE</a></li>--}}


                {{--<li><a href="#">COA</a></li>--}}

            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="/auth/login">Login</a></li>
                    <li><a href="/auth/register">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">User: {{ Auth::user()->user_name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>



@yield('content')


<nav class="navbar navbar-default navbar-fixed-bottom  br-taskbar">
    <div class="container-fluid">

        <div>

            <ul class="nav navbar-nav">
                @if (Session::has('flash_notification.message'))
                    <div class="alert alert-{{ Session::get('flash_notification.level') }} br-alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <span class="glyphicon glyphicon-lock"></span>
                        {{ Session::get('flash_notification.message') }}
                    </div>
                @endif

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Transaction: {!! strtoupper(Request::route()->getName()) !!}</a></li>
                {{--<li><a href="#">Developed by Jason Lawrence</a></li>--}}
            </ul>
        </div>
    </div>
</nav>
<!-- Scripts -->
<script src="/js/all.js"></script>
</body>
</html>
