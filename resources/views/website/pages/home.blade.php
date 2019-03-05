@extends('website.layouts.app')

@section('page_title', 'Home')

@section('content')
    <div class="uk-section uk-section-muted uk-section-small" data-src="{{ asset('restaurant.png') }}" uk-img>
        <div class="uk-container uk-text-center">
            <h1>Home</h1>
        </div>
    </div>
@stop
