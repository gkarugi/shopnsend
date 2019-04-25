@extends('website.layouts.app')

@section('page_title', 'Reset Password')

@section('content')
    <div class="uk-section">
        <div class="uk-container">
            <form action="{{ route('password.phone.reset.password') }}" method="post">
                <fieldset class="uk-fieldset">
                    <legend class="uk-legend">Reset password</legend>
                    @csrf
                    <div class="uk-margin-small">
                        <label for="phone">Phone number</label>
                        <input class="uk-input" type="text" name="phone" id="phone" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <div class="uk-text-danger">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="uk-margin-small">
                        <label for="code">Reset Code</label>
                        <input class="uk-input" type="text" name="code" id="code" value="{{ old('code') }}">
                        @if ($errors->has('code'))
                            <div class="uk-text-danger">{{ $errors->first('code') }}</div>
                        @endif
                    </div>
                    <div class="uk-margin-small uk-text-left@s uk-text-small">
                        <a href="#login-register" uk-toggle onclick="event.preventDefault(); UIkit.switcher('#login-register-switch').show(2);">Resend Code?</a>
                    </div>
                    <div class="uk-margin-small">
                        <label for="new_password">new password</label>
                        <input class="uk-input" type="password" name="new_password" id="new_password">
                        @if ($errors->has('new_password'))
                            <div class="uk-text-danger">{{ $errors->first('new_password') }}</div>
                        @endif
                    </div>
                    <div class="uk-margin-small">
                        <label for="new_password_confirmation">Confirm new password</label>
                        <input class="uk-input" type="password" name="new_password_confirmation" id="new_password_confirmation">
                        @if ($errors->has('new_password'))
                            <div class="uk-text-danger">{{ $errors->first('new_password') }}</div>
                        @endif
                    </div>
                    <div class="uk-margin-small">
                        <button class="uk-button uk-button-primary" type="submit">Change password</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@stop
