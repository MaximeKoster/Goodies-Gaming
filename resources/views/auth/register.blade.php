@extends('layouts.app')

@section('content')
    <div id="registerbox">
        <img src="https://tbncdn.freelogodesign.org/fbcb4c09-6aa2-45e2-ad16-a98d67933301.png?1540981269782" id="logo">
        <h1>Inscription</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name" class="col-form-label text-md-right">{{ __('User Name') }}</label>
            <input placeholder="Enter your username" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

            <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail') }}</label>
            <input placeholder="Enter your email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
            <input placeholder="Enter your password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            <input placeholder="Confirm your password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
            <a href="#">Déjà Membre ?</a>
        </form>
    </div>
@endsection
