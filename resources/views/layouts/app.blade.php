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
    <script src="{{ asset('js/layouts.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/catalogue.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">

</head>
<body>
<nav>
    <!-- Left Side Of Navbar -->
    <ul>
        <div id="header-searchbar">
            <a   id="header-click-logo" href="{{ url('/') }}">
                <img width="50px" height="50px " src="https://tbncdn.freelogodesign.org/fbcb4c09-6aa2-45e2-ad16-a98d67933301.png?1540981269782"
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
                    <a href="{{ route('catalogue') }}" class="dropbtn">Catalogue</a>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">{{ Auth::user()->name }}</a>
                    <div class="dropdown-content">
                        <a href="{{ route('myprofile') }}">My Profile</a>
                        <a href="#">History</a>
                        @if(Auth::user()->permissions == "admin")
                            <a href="{{ route('admin') }}">Admin</a>
                        @endif
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

                {{-- <li class="dropdown">--}}
                <li class="dropdown">
                    <a href="{{ route('cart') }}" class="dropbtn">Cart ( <?php
                        $query = \App\Models\Cart::where('user_id', Auth::user()->id)->count();
                        echo $query
                        ?> )</a>
                </li>
                {{--<div class="cart-content">
                    <table class="tcart">
                        <thead>
                        <th>Article name</th>
                        <th>Price</th>
                        <th>Amount</th>
                        </thead>
                        <tbody>
                        @yield('cartheader')
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2">Total Price :</td>
                            <td><input type="submit" value="confirm"></td>
                        </tr>
                        </tfoot>
                    </table>--}}
            </div>
            {{--</li>--}}
            </div>
        @endguest
    </ul>
</nav>

<main class="py-4">
    @yield('content')
</main>

<footer>
    <div class="footer">
        <a class="to-left" id=" textpetit">&copy;Copyright GoodiesGaming By Tom & Maxime</a>

        <a href="{{ url("https://www.facebook.com/") }}" target="_blank"><img id="zoom" class="to-right"
                                                                              src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Facebook_logo_%28square%29.png/600px-Facebook_logo_%28square%29.png"
                                                                              height="25" weight="25"></a>
        <a href="{{ url("https://linkedin.com/") }}" target="_blank"><img id="zoom" class="to-right"
                                                                          src="https://business.utsa.edu/wp-content/uploads/2018/05/linkedin-logo.png"
                                                                          height="25" weight="25"></a>
        <a href="{{ url("https://twitter.com/?lang=en") }}" target="_blank"><img id="zoom" class="to-right"
                                                                                 src="http://www.kittysanders.com/wp-content/uploads/2014/01/Twitter-Logo-Icon-600x600.png"
                                                                                 height="25" weight="25"></a>
    </div>
</footer>
</body>
</html>
