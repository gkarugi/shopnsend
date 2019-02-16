@extends('manage.layouts.master')

@section('bodyClass','fix-header card-no-border fix-sidebar')

@section('mainLayout')
    <div class="app">
        <!-- Main wrapper - style you can find in pages.scss -->
        <div id="main-wrapper">
            @include('manage.includes.top-bar')
            @include('manage.includes.nav-bar')
            @include('manage.includes.content')
        </div>
        <!-- End Wrapper -->
    </div>
@stop
