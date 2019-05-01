@extends('dashboard.layouts.app')

@section('page_title', 'Dashboard')

@section('page')
    @inject('metrics', 'App\Http\Controllers\DashboardController')

    @if(auth()->user()->inRole('administrator'))
        @include('dashboard.administrator.dashboard_include', compact('metrics'))
    @elseif(auth()->user()->inRole('store_owner'))
        @include('dashboard.stores.dashboard_include', compact('metrics'))
    @elseif(auth()->user()->inRole('cashier'))
        @include('dashboard.cashiers.dashboard_include', compact('metrics'))
    @endif
@stop
