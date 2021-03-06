<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@section('title') {{ config('app.name', 'Laravel') }} @show</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <style>
    @section('styles')
    body {
        background-color: #f5f8fa;
    }

    .swag-line:before {
        content: '';
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        z-index: 2000;
        background-color: #ac2aa1;
        background: -webkit-linear-gradient(45deg, #6b15a1, #ac2aa1);
        background: linear-gradient(45deg, #6b15a1, #ac2aa1);
    }

    .navbar-default .navbar-nav > .active > a {
        color: inherit;
        background-color: inherit;
        border-bottom: 2px solid #6b15a1;
    }
    .panel {
        background: #ffffff;
        border-top: 5px solid #6b15a1;
        width: 100%;
        box-shadow: 0 2px 20px rgba(0,0,0,0.2);
    }
    .btn {
        border: 1px solid #6b15a1;
        background: #6b15a1;
        font-size: 14px;
        padding: 7px 24px;
        border-radius: 4px;
        color: #fff;
    }
    .box-title {
        margin-top: 0;
    }
    .table > tbody > tr.title > th {
        background-color: #d6d7fc;
        color: #8a4ca4;
    }
    @show
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app" class="swag-line">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('admin') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="{{ (Request::is('old/withdraw/pendings') ? ' active' : '') }}">
                            <a class="navbar-brand" href="{{ url('old/withdraw/pendings') }}"> Pending </a>
                        </li>
                        <li class="{{ (Request::is('old/history/deposits') ? ' active' : '') }}">
                            <a class="navbar-brand" href="{{ url('old/history/deposits') }}"> Deposits </a>
                        </li>
                        <li class="{{ (Request::is('old/history/withdraws') ? ' active' : '') }}">
                            <a class="navbar-brand" href="{{ url('old/history/withdraws') }}"> Withdraws </a>
                        </li>
                        <li class="{{ (Request::is('packages') ? ' active' : '') }}">
                            <a class="navbar-brand" href="{{ url('packages') }}"> Packages </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @if (session()->has('flash_notification.message'))
                <div class="alert alert-{{ session('flash_notification.level') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    {!! session('flash_notification.message') !!}
                </div>
            @endif
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
