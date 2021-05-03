<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Quickstart - Basic</title>
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href='{{ asset("css/style.css") }}'>
</head>
<body id="app-layout">
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <h3>Laravel Example World project</h3>
            <a class="navbar-brand" href="{{ url('/') }}">Home </a>
            <a class="navbar-brand" href="{{ url('/countries') }}">Countries list</a>
            <a class="navbar-brand" href="{{ url('/cities') }}">Cities list</a>
            <a class="navbar-brand" href="{{ url('/continent') }}">Countries by Contitnent</a>
            <a class="navbar-brand" href="{{ url('/filter') }}">Filer by Countries</a>

        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Hello, {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <br>
            <div class="nav navbar-nav navbar-right" style="margin-top: 40px; margin-right: -150px;">
                <form action="{{route('search')}}" method="GET">
                    <input type="text" name="search" required>
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</nav>
<div class="content" >
    @yield('content')
</div>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Aleksander Russovits JPTVR18 2021&copy;</span>
    </div>
</footer>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
