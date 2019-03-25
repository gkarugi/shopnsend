@extends('website.layouts.landing')

@section('page_title', $store->name)

@section('content')
    <div class="uk-section uk-section-muted uk-section uk-padding-remove-bottom uk-background-cover uk-background-norepeat bg-dark" data-src="{{ get_media_url($store->getFirstMedia('banner-images')) }}" uk-img>
        <div class="uk-container">
            <div class="uk-flex uk-flex-between" uk-grid>
                <div class="uk-width-1-4@m uk-margin-remove-bottom">
                    <div class="uk-background-muted uk-padding">
                        <h1>{{ $store->name}}</h1>
                    </div>
                </div>
                <div class="uk-width-1-4@m uk-align-right uk-margin-remove-bottom">
                    <img src="{{ get_media_url($store->getFirstMedia('main-images')) }}" alt="">
                </div>
            </div>
        </div>
        <div class="uk-overlay-default"></div>
    </div>

    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-column-small" uk-grid>
                <div class="uk-width-1-4@m">
                    <ul class="uk-nav uk-nav-default" data-uk-sticky="offset:100">
                        <li class="uk-nav-header">Menu</li>
                        @foreach($store->groupings as $group)
                            @if(!count($group->products) >= 1)
                                @break
                            @endif
                            <li>
                                <a href="#{{ $group->slug }}" uk-scroll="offset: 80">{{ $group->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="uk-width-expand@m">
                    @foreach($store->groupings as $group)
                        @if(!count($group->products) >= 1)
                            @break
                        @endif
                        <div class="uk-card uk-card-default uk-margin-medium-bottom uk-card-hover" id="{{ $group->slug }}">
                            <div class="uk-card-header">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-expand">
                                        <h3 class="uk-card-title uk-margin-remove-bottom">{{ $group->name }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-card-body">
                                @foreach($group->products as $product)
                                    <dl class="uk-description-list">
                                        <dt class="uk-text-bold uk-text-large"><h4>{{ $product->name }}</h4></dt>
                                        <dd>{{ $product->description }}</dd>
                                        <div class="uk-flex uk-flex-right uk-flex-middle">
                                            <span>{{ $product->currency }} {{ $product->price }} &nbsp;</span>
                                            <a href="{{ route('website.cartAdd', $product) }}" onclick="event.preventDefault(); document.getElementById('cart-add-{{ $product->id }}').submit();" class="uk-button uk-button-danger"> Buy</a>
                                            <form id="cart-add-{{ $product->id }}" action="{{ route('website.cartAdd', $product) }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </dl>
                                    @if(!$loop->last)
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
