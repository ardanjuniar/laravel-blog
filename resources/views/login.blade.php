@extends('layouts.auth')
@section('title', 'Login Page')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Laravel</b>Blog</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Aplikasi Laravel Blog</p>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email" value="{{ old('email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                </div>
                <!-- /.col -->
            </div>
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register?') }}</a>
        </form>


        <!-- /.social-auth-links -->



    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
