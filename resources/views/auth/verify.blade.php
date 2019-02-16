@extends('dashboard.layouts.auth')

@section('content')
    <form class="card" action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="card-body p-4">
            <div class="card-title">Verify Your Email Address</div>
            {{--<p class="text-muted">Enter your email address and your password will be reset and emailed to you.</p>--}}

            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        </div>
    </form>
@endsection