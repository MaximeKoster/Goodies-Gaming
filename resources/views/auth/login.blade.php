@extends('layouts.app')

@section('content')
    <div class="loginbox">
        <img src="https://tbncdn.freelogodesign.org/fbcb4c09-6aa2-45e2-ad16-a98d67933301.png?1540981269782"
             id="loginlogo">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail') }}</label>
            <input placeholder="Enter your email" type="email"
                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                   value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
            <input placeholder="Enter your password" type="password"
                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            <button type="submit">
                {{ __('Login') }}
            </button>

            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a><br>

            <a class="btn btn-link noaccount" href="{{url("/register")}}">
                No account ? Register here.
            </a><br>
        </form>
    </div>
@endsection
