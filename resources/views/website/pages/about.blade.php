@extends('website.layouts.app')

@section('page_title', 'About Us')

@section('content')
    <div class="uk-section uk-section-muted uk-section-small" data-src="{{ asset('restaurant.png') }}" uk-img>
        <div class="uk-container uk-text-center">
            <h1>About Us</h1>
        </div>
    </div>
@stop
