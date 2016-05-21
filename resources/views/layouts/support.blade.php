<!DOCTYPE html>
<html>
    <head>
        <title>jalawren.website |
        @yield('title')
        </title>
        <link href="/css/app.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container jl-container" align="center">
            <div class="panel jl-panel">
                <div id="app" class="panel-body">
                    @yield('content')
                </div>
            </div>
        </div>
        @if(\Session::has('message'))
            <div class="alert">
                {{ \Session::get('message') }}
            </div>
        @endif
        <script src="/js/app.js"></script>
    </body>
</html>