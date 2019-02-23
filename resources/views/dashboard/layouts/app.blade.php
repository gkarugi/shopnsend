@extends('dashboard.layouts.master')

@section('bodyClass','fix-header card-no-border fix-sidebar')

@section('mainLayout')
    <div class="app" id="app">
        <!-- Main wrapper - style you can find in pages.scss -->
        <div id="main-wrapper">
            @include('dashboard.includes.top-bar')
            @include('dashboard.includes.nav-bar')
            @include('dashboard.includes.content')
        </div>
        <!-- End Wrapper -->
    </div>
@stop
