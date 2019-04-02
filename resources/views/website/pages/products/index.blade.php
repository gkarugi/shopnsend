@extends('website.layouts.app')

@section('page_title', 'Menus')

@section('content')

    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-small uk-child-width-expand@s" uk-height-match=".img" uk-grid>
                @foreach($products as $product)
                    @include('website.pages.products.grid-item')
                @endforeach
            </div>
            {{--{{ $safaris->links('vendor.pagination.uikit') }}--}}
        </div>
    </div>
@stop
