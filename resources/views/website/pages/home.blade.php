@extends('website.layouts.landing')

@section('page_title', 'Home')

@section('content')
    <section class="uk-section uk-section-default">
        <div class="uk-container">
            <div class="uk-grid uk-flex-center uk-text-center">
                <div class="uk-width-1-2@s">
                    <h1 class="">Send Meals and Drinks to your friends and family in minutes.</h1>
                    <p>
                        <a href="#stores" class="uk-text-uppercase uk-text-large uk-button uk-button-danger uk-margin-top" uk-scroll>Browse Stores <span data-uk-icon="icon: chevron-down"></span></a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="uk-section uk-section-muted uk-margin-remove-bottom uk-padding" id="stores">
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
