@extends('layouts.app')

@section('content')
    <head>
        <meta charset="UTF-8">
        <title>GoodiesGaming</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">
    </head>
    <body>
    <div class="registerbox">
        <img src="https://tbncdn.freelogodesign.org/fbcb4c09-6aa2-45e2-ad16-a98d67933301.png?1540981269782"
             class="logo">
        <h1>Inscription</h1>
        <form method="POST" action="{{ route('registered') }}">
            @csrf
            <div>
                <p>UserName</p>
                <input type="text" name="name" placeholder="Nom d'utilisateur">
            </div>
            <div>
                <p>E-mail</p>
                <input type="text" name="email"  placeholder="E-mail">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <p>Password</p>
                <input type="password" name="password" placeholder="Mot de passe">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif <strong>{{ $errors->first('email') }}</strong>
            </div>
            <div>
                <p>Confirm password</p>
                <input type="password" name="password" placeholder="Confirmez votre Mot de passe">
            </div>
            <input type="submit" name="" value="Register">
        </form>
        <a href="#">Déja Membre ?</a>
    </div>
    </body>
@endsection