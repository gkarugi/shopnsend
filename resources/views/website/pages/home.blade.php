@extends('website.layouts.landing')

@section('page_title', 'Home')

@section('content')
    <div class="uk-section uk-margin-remove-bottom uk-padding-remove-bottom">
        <div class="uk-container">
            <h3>Featured Stores</h3>
            <div class="uk-grid-small uk-child-width-expand@s" uk-height-match=".img" uk-grid>
                @foreach($stores as $store)
                    @include('website.pages.stores.grid-item')
                @endforeach
            </div>
        </div>
    </div>
    <div class="uk-section uk-margin-remove-top">
        <div class="uk-container">
            <h3>Featured Categories</h3>
            <div class="uk-grid-small uk-child-width-expand@s" uk-height-match=".img" uk-grid>
                @foreach($categories as $category)
                    @include('website.pages.categories.grid-item')
                @endforeach
            </div>
        </div>
    </div>
@stop
