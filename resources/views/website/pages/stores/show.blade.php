@extends('website.layouts.landing')

@section('page_title', $store->name)

@section('content')
    <div class="uk-section uk-section-muted uk-section uk-padding-remove-bottom uk-background-cover uk-background-norepeat bg-dark uk-height-medium" data-src="{{ get_media_url($store->getFirstMedia('banner-images')) }}" uk-img>
        <div class="uk-overlay-default"></div>
    </div>

    <div class="uk-section uk-section-muted uk-margin-remove-top uk-padding-remove-top">
        <div class="uk-container">
            <div>
                <div class="uk-background-default uk-panel uk-padding"  style="margin-top: -50px">
                    <h1>{{ $store->name}}</h1>
                </div>
            </div>
            <div>
                <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
                    <div class="uk-navbar-left">
                        <ul class="uk-navbar-nav">
                            @foreach($store->groupings as $group)
                                @if(!count($group->products) >= 1)
                                    @break
                                @endif
                                    <li class="uk-text-bold"><a href="#{{ $group->slug }}" uk-scroll="offset: 80">{{ $group->name }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="uk-navbar-right">...</div>
                </nav>
            </div>
            <div class="uk-grid-column-small" uk-grid>
                {{--<div class="uk-width-1-4@m">--}}
                    {{--<ul class="uk-nav uk-nav-default" data-uk-sticky="offset:100">--}}
                        {{--<li class="uk-nav-header">Menu</li>--}}
                        {{--@foreach($store->groupings as $group)--}}
                            {{--@if(!count($group->products) >= 1)--}}
                                {{--@break--}}
                            {{--@endif--}}
                            {{--<li>--}}
                                {{--<a href="#{{ $group->slug }}" uk-scroll="offset: 80">{{ $group->name }}</a>--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
                <div class="uk-width-expand@m">
                    @foreach($store->groupings as $group)
                        @if(!count($group->products) >= 1)
                            @break
                        @endif

                        <h2 id="{{ $group->slug }}">{{ $group->name }}</h2>

                        <div class="uk-grid-small uk-child-width-expand@s" uk-height-match="#item" uk-grid>
                            @foreach($group->products as $product)
                                <div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l" id="item">
                                    <div class="uk-background-default uk-panel" style="padding: 25px">
                                        <div class="uk-text-large">{{ $product->name }}</div>
                                        <p class="uk-text-bold">{{ $product->currency }} {{ $product->price }} &nbsp;</p>
                                        <div class="uk-flex uk-flex-right uk-flex-middle">
                                            <a href="{{ route('website.cartAdd', $product) }}" onclick="event.preventDefault(); document.getElementById('cart-add-{{ $product->id }}').submit();" class=""><span uk-icon="icon: plus; ratio: 1.05"></span>&nbsp;</a>
                                            <form id="cart-add-{{ $product->id }}" action="{{ route('website.cartAdd', $product) }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
