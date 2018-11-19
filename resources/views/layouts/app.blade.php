<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>
<body>
<nav>
    <!-- Left Side Of Navbar -->
    <ul>
        <div id="header-searchbar">
            <a id="header-click-logo" href="{{ url('/') }}">
                <img src="https://tbncdn.freelogodesign.org/fbcb4c09-6aa2-45e2-ad16-a98d67933301.png?1540981269782"
                     id="headerlogo">
            </a>
            <form action="" class="formulaire">
                <input class="champ" type="text" placeholder="Search..."/>
                <input class="bouton" type="button" value="🔍"/>
            </form>
        </div>

        <!-- Right Side Of Navbar -->
        <!-- Authentication Links -->
        @guest
            <div class="listit">
                <li class="dropdown">
                    <a class="guestbutton" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="dropdown">
                    @if (Route::has('register'))
                        <a class="guestbutton" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
            </div>
        @else
            <div class="listit">
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Catalogue</a>
                    <div class="dropdown-content">
                        <a href="#">Goodies</a>
                        <a href="#">Accessories </a>
                        <a href="#">Consoles</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">{{ Auth::user()->name }}</a>
                    <div class="dropdown-content">
                        <a href="#">My Profile</a>
                        <a href="#">History</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Help</a>
                    <div class="dropdown-content">
                        <a href="#">Information</a>
                        <a href="#">Contact</a>
                        <a href="#">QnA</a>
                        <a href="#">S.A.V</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="dropbtn" href="/">Cart</a>
                    <div class="dropdown-content">
                        <a href="#">oui </a>
                    </div>
                </li>
            </div>
        @endguest
    </ul>
</nav>

<main class="py-4">
    @yield('content')
</main>
</body>
</html>
