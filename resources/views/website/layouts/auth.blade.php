@extends('website.layouts.master')

@section('mainLayout')
    <div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
        <div class="uk-container">
            <div>
                <div class="uk-grid-margin uk-grid uk-grid-stack uk-width-1-1 uk-flex-middle" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                            <div class="uk-text-center">
                                <img class="is-rounded" src="{{ asset('topiblu-full-logo.png') }}" alt="{{ config('app.name') }} Logo" title="{{ config('app.name') }} Logo" width="220" uk-image/>
                            </div>
                            <h3 class="uk-card-title uk-text-center uk-margin-medium"> @yield('authPageTitle') </h3>
                            @yield('content')
                        </div>
                    </div>
                    {{--<div class="uk-width-1-2@m">--}}
                        {{--<div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">--}}
                            {{--<h3 class="uk-card-title uk-text-center uk-margin-medium"> You can authenticate using </h3>--}}
                            {{--<div class="uk-margin">--}}
                                {{--<a class="uk-button uk-button-primary uk-button-large uk-width-1-1" href="{{ route('auth.provider','facebook') }}">--}}
                                    {{--<span uk-icon="icon: facebook"></span>Register with Facebook--}}
                                {{--</a>--}}
                            {{--</div>--}}

                            {{--<div class="uk-margin">--}}
                                {{--<a class="uk-button uk-button-danger uk-button-large uk-width-1-1" href="{{ route('auth.provider','google') }}">--}}
                                    {{--Register with Google--}}
                                {{--</a>--}}
                            {{--</div>--}}

                            {{--<div class="uk-margin">--}}
                                {{--<a class="uk-button uk-button-large uk-width-1-1" style="background-color: #38A1F3; color: #fff" href="{{ route('auth.provider','twitter') }}">--}}
                                    {{--Register with Twitter--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>

    {{--<div class="container">--}}
        {{--<div id="app">--}}
            {{--<div class="columns is-marginless is-centered is-flex is-vcentered">--}}
                {{--<div class="column is-4">--}}
                    {{--<div class="card">--}}
                        {{--<div class="card-image has-text-centered">--}}
                            {{--<figure class="image is-96x96 is-inline-block">--}}
                                {{--<img class="is-rounded" src="{{ asset('topiblu-icon.png') }}" alt="{{ config('app.name') }} Logo" title="{{ config('app.name') }} Logo"/>--}}
                            {{--</figure>--}}
                        {{--</div>--}}
                        {{--<header class="card-header ">--}}
                            {{--<h3 class="card-header-title is-centered">--}}
                                {{--@yield('authPageTitle')--}}
                            {{--</h3>--}}
                        {{--</header>--}}

                        {{--<div class="card-content">--}}
                            {{--@yield('content')--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@stop