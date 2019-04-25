@extends('dashboard.layouts.auth')

@section('page_title', 'Forgot Password, E-mail reset link')

@section('content')
    <form class="card" action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="card-body p-6">
            <div class="card-title">Forgot password</div>
            <p class="text-muted">Enter your email address and your password will be reset and emailed to you.</p>
            <div class="form-group">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Email address</label>
                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" aria-describedby="email" placeholder="Enter email" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary btn-block">Send me new password</button>
            </div>
        </div>
    </form>
@endsection
