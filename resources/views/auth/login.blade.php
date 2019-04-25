@extends('dashboard.layouts.auth')

@section('page_title', 'Login')

@section('content')
    <form class="card" action="{{ route('login') }}" method="post">
        @csrf
        <div class="card-body p-6">
            <div class="card-title">Login to your account</div>
            <div class="form-group">
                <label for="identity" class="form-label">Email or phone</label>
                <input type="text" class="form-control {{ $errors->has('identity') ? ' is-invalid' : '' }}" id="identity" name="identity" value="@if(!is_null(old('phone'))) {{ old('phone') }} @elseif(!is_null(old('email'))) {{ old('email') }} @endif" aria-describedby="identity" placeholder="Enter phone or E-mail" required autofocus>
                @if ($errors->has('identity'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('identity') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password" class="form-label">
                    Password
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="float-right small">I forgot password</a>
                    @endif
                </label>
                <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                    <label for="remember" class="custom-control-label">Remember me</label>
                </label>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
            </div>
        </div>
    </form>
    <div class="text-center text-muted">
        @if (Route::has('register'))
            Don't have account yet? <a href="{{ route('register') }}">Sign up</a>
        @endif
    </div>
@endsection
