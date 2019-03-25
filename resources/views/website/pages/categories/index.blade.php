@extends('website.layouts.app')

@section('page_title', 'Categories')

@section('content')
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-small uk-child-width-expand@s" uk-height-match=".img" uk-grid>
                @foreach($categories as $category)
                    @include('website.pages.categories.grid-item')
                @endforeach
            </div>
            {{--{{ $safaris->links('vendor.pagination.uikit') }}--}}
        </div>
    </div>
@stop
