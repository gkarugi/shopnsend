@extends('website.layouts.app')

@section('page_title', 'Checkout')

@section('page_title_action')
    <a class="uk-link-text uk-text-small" href="{{ route('website.cart') }}">
        <span class="uk-margin-xsmall-right" uk-icon="icon: arrow-left; ratio: .75;"></span> Return to Cart
    </a>
@stop

@section('content')
    <section class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-medium uk-child-width-1-1 uk-grid-stack" uk-grid>
                <section class="uk-grid-margin">
                    <div class="uk-grid-medium" uk-grid>
                        <form action="{{ route('website.perform.checkout') }}" method="post" class="uk-form-stacked uk-width-1-1 tm-checkout uk-width-expand@m">
                            @csrf
                            <div class="uk-grid-medium uk-child-width-1-1 uk-grid-stack" uk-grid>
                                <section>
                                    <div class="uk-card uk-card-default uk-card-small uk-card-body tm-ignore-container">
                                        <div class="uk-card-body">
                                            <h3 class="tm-checkout-title">Receiving Customer</h3>
                                            <div>
                                                <label for="name" class="uk-form-label uk-form-label-required">Name</label>
                                                <input class="uk-input" type="text" name=name id="name" value="{{ old('name') }}" required>
                                            </div>
                                            <div>
                                                <label for="phone" class="uk-form-label uk-form-label-required">Phone Number</label>
                                                <input class="uk-input" type="text" name=phone id="phone" value="{{ old('phone') }}" required>
                                            </div>
                                            <div class="uk-grid-margin uk-text-center uk-margin-bottom">
                                                <button type="submit" class="uk-button uk-button-primary" @if(count(LaraCart::getItems()) == 0) disabled @endif>Order and Proceed to payments</button>
                                            </div>
                                        </div>
                                        <div class="uk-card-footer">
                                            <div class="uk-grid-small uk-flex-middle uk-flex-center uk-text-center" uk-grid>
                                                <div class="uk-text-meta">
                                                    <span class="uk-margin-xsmall-right" uk-icon="icon: lock; ratio: .75;"></span> Hosted Payment service is provided by Ipay africa. You will be redirected to Ipay for payment.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </form>
                        <div class="uk-width-1-1 uk-width-1-4@m tm-aside-column">
                            <div class="uk-card uk-card-default uk-card-small tm-ignore-container uk-sticky" uk-sticky="offset: 100; bottom: true; media: @m;" style="z-index: 1">
                                <section class="uk-card-body">
                                    <h4>Items in order</h4>
                                    @if(!empty(LaraCart::getItems()))
                                        @foreach($items = LaraCart::getItems() as $item)
                                            <div class="uk-grid-small" uk-grid>
                                                <div class="uk-width-expand">
                                                    <div class="uk-text-small">{{ $item->name }}
                                                    </div>
                                                    <div class="uk-text-meta">{{ $item->qty }} × {{ $item->price }}</div>
                                                </div>
                                                <div class="uk-text-right">
                                                    <div>KES {{ $item->qty * $item->price }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </section>
                                <section class="uk-card-body">
                                    <div class="uk-grid-small" uk-grid>
                                        <div class="uk-width-expand">
                                            <div class="uk-text-muted">Shipping</div>
                                        </div>
                                        <div class="uk-text-right">
                                            <div>Pick up from store</div>
                                            <div class="uk-text-meta">Free</div>
                                        </div>
                                    </div>
                                    <div class="uk-grid-small" uk-grid>
                                        <div class="uk-width-expand">
                                            <div class="uk-text-muted">Payment</div>
                                        </div>
                                        <div class="uk-text-right">
                                            <div>Online using Ipay Africa</div>
                                        </div>
                                    </div>
                                </section>
                                <section class="uk-card-body">
                                    <div class="uk-grid-small" uk-grid>
                                        <div class="uk-width-expand">
                                            <div class="uk-text-muted">Subtotal</div>
                                        </div>
                                        <div class="uk-text-right">
                                            <div>KES {{ LaraCart::subTotal($formatted = false, $withDiscount = false) }}</div>
                                        </div>
                                    </div>
                                    <div class="uk-grid-small" uk-grid>
                                        <div class="uk-width-expand">
                                            <div class="uk-text-muted">Fee</div>
                                        </div>
                                        <div class="uk-text-right">
                                            <div class="uk-text-muted">KES {{ LaraCart::getFee('serviceFee')->getAmount($format = false, $withTax = false) }}</div>
                                        </div>
                                    </div>
                                    <div class="uk-grid-small" uk-grid>
                                        <div class="uk-width-expand">
                                            <div class="uk-text-muted">Discount</div>
                                        </div>
                                        <div class="uk-text-right">
                                            <div class="uk-text-danger">- KES 0</div>
                                        </div>
                                    </div>
                                </section>
                                <section class="uk-card-body uk-margin">
                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                        <div class="uk-width-expand">
                                            <div class="uk-text-muted">Total</div>
                                        </div>
                                        <div class="uk-text-right">
                                            <div class="uk-text-lead uk-text-bolder">KES {{ LaraCart::total($formatted = false, $withDiscount = true, $withTax = false, $withFees = true) }}</div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@stop
