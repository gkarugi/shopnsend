@extends('website.layouts.landing')

@section('page_title', 'Home')

@section('content')
    <div class="uk-section uk-section-default uk-margin-remove-bottom uk-padding">
        <div class="uk-container">
            <h2 class="uk-text-center">Trending Stores to choose from</h2>
            <div class="uk-grid-small uk-child-width-expand@s" uk-height-match=".img" uk-grid>
                @foreach($stores as $store)
                    @include('website.pages.stores.grid-item')
                @endforeach
            </div>
        </div>
    </div>
@stop
