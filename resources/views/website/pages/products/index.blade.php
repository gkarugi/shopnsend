@extends('website.layouts.app')

@section('page_title', 'Menus')

@section('content')

    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-small uk-child-width-expand@s" uk-height-match=".img" uk-grid>
                @foreach($products as $products)
                    @component('website.components.card')
                        {{ ($products->getFirstMedia('main-images')) ? get_media_url($products->getFirstMedia('main-images')) : '#' }}
                        @slot('actionLink', route('website.products.show', $products))
                        @slot('imageAlt', $products->name)
                        @slot('title', $products->name)
                    @endcomponent
                @endforeach
            </div>
            {{--{{ $safaris->links('vendor.pagination.uikit') }}--}}
        </div>
    </div>
@stop
