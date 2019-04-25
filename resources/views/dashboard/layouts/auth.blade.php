@extends('dashboard.layouts.master')

@section('layout_page_title')
    Authentication - @yield('page_title')
@stop

@section('mainLayout')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col col-login mx-auto">
                        <div class="text-center mb-6">
                            {{--<img src="{{ asset('tabler.svg') }}" class="h-6" alt="">--}}
                            {{ config('app.name') }}
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
