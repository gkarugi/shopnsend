@extends('dashboard.layouts.auth')

@section('content')
    <form class="card" action="{{ route('login') }}" method="post">
        @csrf
        <div class="card-body p-6">
            <div class="card-title">Login to your account</div>
            <div class="form-group">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" aria-describedby="email" placeholder="Enter email" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
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
