@extends('website.layouts.app')

@section('page_title', 'My Cart')

@section('content')
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-margin uk-first-column">
                <div class="uk-grid-medium uk-grid" uk-grid="">
                    <div class="uk-width-1-1 uk-width-expand@m uk-first-column">
                        <div class="uk-card uk-card-default uk-card-small tm-ignore-container">
                            <header
                                class="uk-card-header uk-text-uppercase uk-text-muted uk-text-center uk-text-small uk-visible@m">
                                <div class="uk-grid-small uk-child-width-1-2 uk-grid" uk-grid="">
                                    <div class="uk-first-column">product</div>
                                    <div>
                                        <div class="uk-grid-small uk-child-width-expand uk-grid" uk-grid="">
                                            <div class="uk-first-column">price</div>
                                            <div class="tm-quantity-column">quantity</div>
                                            <div>sum</div>
                                            <div class="uk-width-auto">
                                                <div style="width: 20px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <div class="uk-card-body">
                                @if(!empty(LaraCart::getItems()))
                                    @foreach($items = LaraCart::getItems() as $item)
                                        <div class="uk-grid-small uk-child-width-1-1 uk-child-width-1-2@m uk-flex uk-flex-middle" uk-grid>
                                            <div>
                                                <div class="uk-grid-small uk-grid" uk-grid>
                                                    <div class="uk-width-expand">
                                                        <div class="uk-text-meta">Food &amp; Drinks</div>
                                                        <a class="uk-link-heading" href="#">{{ $item->name }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="uk-grid-small uk-child-width-1-1 uk-child-width-expand@s uk-text-center uk-flex uk-flex-middle" uk-grid>
                                                    <div class="uk-first-column">
                                                        <div class="uk-text-muted uk-hidden@m">Price</div>
                                                        <div>{{ $item->currency }} {{ $item->price }}</div>
                                                    </div>
                                                    <div class="uk-inline">
                                                        <a class="uk-form-icon uk-form-icon-flip" href="" uk-icon="icon: plus; ratio: .75" onclick="event.preventDefault(); document.getElementById('add-qty').submit();"></a>
                                                        <a class="uk-form-icon" href="" uk-icon="icon: minus; ratio: .75" style="padding-left: 15px" onclick="event.preventDefault(); document.getElementById('sub-qty').submit();"></a>
                                                        <input class="uk-input" name="qty" value="{{ $item->qty }}">

                                                        <form id="add-qty" action="{{ route('website.cartQtyAdd') }}" method="POST" style="display: none;">
                                                            @csrf
                                                            <input type="hidden" name="hash" value="{{ $item->getHash() }}">
                                                            <input type="hidden" name="qty" value="{{ $item->qty }}">
                                                        </form>

                                                        <form id="sub-qty" action="{{ route('website.cartQtySub') }}" method="POST" style="display: none;">
                                                            @csrf
                                                            <input type="hidden" name="hash" value="{{ $item->getHash() }}">
                                                            <input type="hidden" name="qty" value="{{ $item->qty }}">
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <div class="uk-text-muted uk-hidden@m">Sum</div>
                                                        <div>{{ $item->currency }} {{ $item->qty * $item->price  }}</div>
                                                    </div>
                                                    <div class="uk-width-auto@s">
                                                        <a href="{{ route('website.cartRemove') }}" class="uk-text-danger" uk-tooltip="Remove" title="Remove Item" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('cart-remove-{{ $item->getHash() }}').submit();">
                                                            <span uk-icon="close" class="uk-icon"></span>
                                                        </a>
                                                        <form id="cart-remove-{{ $item->getHash() }}" action="{{ route('website.cartRemove') }}" method="POST" style="display: none;">
                                                            @csrf
                                                            <input type="hidden" name="hash" value="{{ $item->getHash() }}">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="uk-grid-small uk-child-width-1-1 " uk-grid>
                                        <div class="uk-h1 uk-flex uk-flex-center uk-text-muted">Empty</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-1 tm-aside-column uk-width-1-4@m">
                        <div class="uk-card uk-card-default uk-card-small tm-ignore-container uk-sticky" uk-sticky="offset: 80; bottom: true; media: @m;">
                            <div class="uk-card-body">
                                <div class="uk-grid-small uk-grid" uk-grid="">
                                    <div class="uk-width-expand uk-text-muted uk-first-column">Subtotal</div>
                                    <div>KES {{ LaraCart::subTotal($formatted = false, $withDiscount = false) }}</div>
                                </div>
                            </div>
                            <div class="uk-card-body">
                                <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">
                                    <div class="uk-width-expand uk-text-muted uk-first-column">Total</div>
                                    <div class="uk-text-lead uk-text-bolder">KES {{ LaraCart::total($formatted = false, $withDiscount = false) }}</div>
                                </div>
                                <hr>
                                <a class="uk-button uk-button-primary uk-margin-small uk-width-1-1" href="{{ route('website.checkout') }}">checkout</a></div>
                        </div>
                        <div class="uk-sticky-placeholder" style="height: 230px; margin: 0px;" hidden=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
