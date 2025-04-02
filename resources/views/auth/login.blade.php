{{-- @extends('layouts.app') --}}
@extends('layouts.public')


@section('content')

<div class="d-flex flex-column justify-content-center mb-5 " id="login-box" >
    <div class="login-box-header">
        <h4 style="color:rgb(139,139,139);margin-bottom:0px;font-weight:600;font-size:27px;"><strong><span
                    style="color: rgb(34, 177, 76);">Login</span></strong></h4>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
    
        <div class="row mt-5 mb-2">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    
        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    
       
    
        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary" style="background: #22b14c;">{{ __('Login') }}</button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                @endif
            </div>
        </div>
    
        <div id="login-box-footer" class="text-center mt-4 mb-4 ">
            <p style="margin-bottom:0px;">Don't have an account? <a id="register-link" href="{{ route('register') }}" style="color: #22b14c;">Sign Up!</a></p>
        </div>
    </form>
</div>
@endsection
