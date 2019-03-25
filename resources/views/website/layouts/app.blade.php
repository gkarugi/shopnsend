@extends('website.layouts.master')

@section('mainLayout')
    @include('website.includes.main-nav')

    <div id="app">
        <section class="uk-section-small uk-text-center uk-background-fixed bg-yellow-dark" data-src="{{ asset('doodles.png') }}" uk-img>
            <div class="uk-container">
                @yield('page_title_action')
                <h1 class="uk-margin-small-top uk-margin-remove-bottom">@yield('page_title')</h1>
            </div>
            <div class="uk-overlay-default"></div>
        </section>
        @yield('content')
    </div>

    @include('website.includes.main-footer')
@stop
