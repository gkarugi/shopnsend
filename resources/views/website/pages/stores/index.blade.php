@extends('website.layouts.app')

@section('page_title', 'Our Packages')

@section('content')
    <div class="uk-section uk-section-muted uk-section-small" data-src="{{ asset('foggy_birds.png') }}" uk-img>
        <div class="uk-container uk-text-center">
            <h3>Stores</h3>
        </div>
    </div>

    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-small uk-child-width-expand@s" uk-height-match=".img" uk-grid>
                @foreach($stores as $store)
                    @component('website.components.card')
                        {{ ($store->getFirstMedia('main-images')) ? get_media_url($store->getFirstMedia('main-images')) : '#' }}
                        @slot('actionLink', route('website.stores.show', $store))
                        @slot('imageAlt', $store->name)
                        @slot('title', $store->name)
                    @endcomponent
                @endforeach
            </div>
            {{--{{ $safaris->links('vendor.pagination.uikit') }}--}}
        </div>
    </div>
@stop
