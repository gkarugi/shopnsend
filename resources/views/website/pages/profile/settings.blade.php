@extends('website.layouts.app')

@section('page_title', 'My Settings')

@section('content')
    <div class="uk-section">
        <div class="uk-container">
            <form action="{{ route('profile.update.password') }}" method="post">
                <fieldset class="uk-fieldset">
                    <legend class="uk-legend">Change password</legend>
                    @csrf
                    <div class="uk-margin">
                        <label for="phone">Phone number</label>
                        <input class="uk-input" type="text" name="phone" id="phone" value="{{ auth()->user()->phone }}" disabled>
                    </div>
                    <div class="uk-margin">
                        <label for="current_password">Current password</label>
                        <input class="uk-input" type="password" name="current_password" id="current_password">
                    </div>
                    <div class="uk-margin">
                        <label for="new_password">new password</label>
                        <input class="uk-input" type="password" name="new_password" id="new_password">
                    </div>
                    <div class="uk-margin">
                        <label for="new_password_confirmation">Confirm new password</label>
                        <input class="uk-input" type="password" name="new_password_confirmation" id="new_password_confirmation">
                    </div>
                    <div class="uk-margin">
                        <button class="uk-button uk-button-primary" type="submit">Change password</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@stop
