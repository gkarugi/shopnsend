@extends('website.layouts.app')

@section('page_title', 'My Cart')

@section('content')
    <section class="uk-section-small uk-text-center">
        <a class="uk-link-muted uk-text-small" href="{{ route('website.cart') }}">
            <span class="uk-margin-xsmall-right" uk-icon="icon: arrow-left; ratio: .75;"></span> Return to cart
        </a>
        <h1 class="uk-margin-small-top uk-margin-remove-bottom">Checkout</h1>
    </section>

    <div class="uk-container">
        <div class="uk-grid-medium uk-child-width-1-1 uk-grid-stack" uk-grid>
            <section class="uk-grid-margin">
                <div class="uk-grid-medium" uk-grid>
                    <form action="{{ route('website.perform.checkout') }}" method="post" class="uk-form-stacked uk-width-1-1 tm-checkout uk-width-expand@m">
                        @csrf
                        <div class="uk-grid-medium uk-child-width-1-1 uk-grid-stack" uk-grid>
                            <section>
                                <h2 class="tm-checkout-title">Contact Information</h2>
                                <div class="uk-card uk-card-default uk-card-small uk-card-body tm-ignore-container">

                                    <h3 class="tm-checkout-title">Your details</h3>
                                    <div class="uk-grid-small uk-child-width-1-1 uk-child-width-1-2@s" uk-grid>
                                        <div>
                                            <label for="fname" class="uk-form-label uk-form-label-required">First Name</label>
                                            <input class="uk-input" type="text" name=fname id="fname" value="{{ old('fname') }}" required>
                                        </div>
                                        <div>
                                            <label for="lname" class="uk-form-label uk-form-label-required">Last Name</label>
                                            <input class="uk-input" type="text" name="lname" id="lname" value="{{ old('lname') }}" required>
                                        </div>
                                        <div class="uk-grid-margin">
                                            <label for="phone" class="uk-form-label uk-form-label-required">Phone Number</label>
                                            <input class="uk-input" type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
                                        </div>
                                        <div class="uk-grid-margin">
                                            <label for="email" class="uk-form-label uk-form-label-required">Email</label>
                                            <input class="uk-input" type="email" name="email" id="email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <h3 class="tm-checkout-title">Receiving customer</h3>
                                    <div class="uk-grid-small uk-child-width-1-1 uk-child-width-1-2@s" uk-grid>
                                        <div>
                                            <label for="rec_fname" class="uk-form-label uk-form-label-required">First Name</label>
                                            <input class="uk-input" type="text" name=rec_fname id="rec_fname" value="{{ old('rec_fname') }}" required>
                                        </div>
                                        <div>
                                            <label for="rec_lname" class="uk-form-label uk-form-label-required">Last Name</label>
                                            <input class="uk-input" type="text" name=rec_lname id="rec_lname" value="{{ old('rec_lname') }}" required>
                                        </div>
                                        <div class="uk-grid-margin">
                                            <label for="rec_phone" class="uk-form-label uk-form-label-required">Phone Number</label>
                                            <input class="uk-input" type="text" name=rec_phone id="rec_phone" value="{{ old('rec_phone') }}" required>
                                        </div>
                                        <div class="uk-grid-margin">
                                            <label for="rec_email" class="uk-form-label uk-form-label-required">Email</label>
                                            <input class="uk-input" type="email" name=rec_email id="rec_email" value="{{ old('rec_email') }}">
                                        </div>
                                        <div class="uk-grid-margin">
                                            <button type="submit" class="uk-button uk-button-primary">Proceed to payments</button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="uk-grid-margin">
                                <h2 class="tm-checkout-title">Proceed to Payment</h2>
                                <div class="uk-card uk-card-default uk-card-small tm-ignore-container">
                                    <div class="uk-card-body">

                                    </div>
                                    <div class="uk-card-footer">
                                        <div class="uk-grid-small uk-flex-middle uk-flex-center uk-text-center" uk-grid>
                                            <div class="uk-text-meta">
                                                <span class="uk-margin-xsmall-right" uk-icon="icon: lock; ratio: .75;"></span> Security of payments is is provided by secure protocols
                                            </div>
                                            <div>
                                                <img src="images/verified-by-visa.svg" title="Verified by Visa" alt="" style="height: 25px;">
                                            </div>
                                            <div>
                                                <img src="images/mastercard-securecode.svg" title="MasterCard SecureCode" alt="" style="height: 25px;">
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
                                                <div>{{ $item->qty * $item->price }}</div>
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
                                        <div class="uk-text-muted">Discount</div>
                                    </div>
                                    <div class="uk-text-right">
                                        <div class="uk-text-danger">- KES 0</div>
                                    </div>
                                </div>
                            </section>
                            <section class="uk-card-body">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-expand">
                                        <div class="uk-text-muted">Total</div>
                                    </div>
                                    <div class="uk-text-right">
                                        <div class="uk-text-lead uk-text-bolder">KES {{ LaraCart::total($formatted = false, $withDiscount = false) }}</div>
                                    </div>
                                </div>
                                <button class="uk-button uk-button-primary uk-margin-small uk-width-1-1">checkout</button>
                            </section>
                        </div>
                        <div class="uk-sticky-placeholder" style="height: 623px; margin: 0px;" hidden=""></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div style="height: 1000px">

    </div>
@stop
