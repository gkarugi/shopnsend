@extends('dashboard.layouts.master')

@section('mainLayout')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col col-login mx-auto">
                        <div class="text-center mb-6">
                            {{--<img src="#" class="h-6" alt="">--}}
                            {{ config('app.name') }}
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
