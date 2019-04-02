@extends('website.layouts.master')

@section('mainLayout')
    @include('website.includes.main-nav')

    <div id="app">
        @yield('content')
    </div>
    @include('website.includes.main-footer')
@stop
