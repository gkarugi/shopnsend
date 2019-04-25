<header data-uk-sticky="animation: uk-animation-slide-top" id="top">
    <div class="uk-navbar-container">
        <div class="uk-container">
            <nav class="uk-navbar main-nav" uk-navbar style="min-height: 80px">
                <div class="uk-navbar-left">
                    <a href="#" class="uk-hidden@s uk-margin-left" uk-navbar-toggle-icon uk-toggle="target: #offcanvas-menu"></a>
                    <a href="../" class="uk-navbar-item uk-logo uk-visible@s">
                        {{--<img uk-image="" src="" class="uk-margin-small-right uk-padding-small" width="215">--}}
                        <span>Shop and Send</span>
                    </a>
                </div>

                <div class="uk-navbar-right">
                    @guest
                        <div class="uk-navbar-item uk-visible@m">
                            <div>
                                <a href="#login-register" class="uk-button uk-button-small uk-button-danger tm-button-default uk-text-bold" uk-toggle>Login / Register</a>
                            </div>
                            @include('website.includes.login-register')
                        </div>
                    @endguest
                    <ul class="uk-navbar-nav">
                        @auth
                            <li>
                                <a href="#" class="uk-navbar-toggle uk-navbar-toggle-icon uk-icon uk-open uk-icon" aria-expanded="false">
                                    <i uk-icon="icon: user"></i> &nbsp; Account
                                </a>
                                <div class="uk-navbar-dropdown"  uk-dropdown="mode: click">
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        @if(!auth()->user()->inRole('customer'))
                                            <li>
                                                <a href="{{ route('dashboard') }}" target="_blank"><span data-uk-icon="icon: cog"></span> &nbsp; Dashboard</a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="{{ route('website.profile.orders') }}"><span data-uk-icon="icon: list"></span> &nbsp; My Orders</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('website.profile.settings') }}"><span data-uk-icon="icon: cog"></span> &nbsp; My Settings</a>
                                        </li>
                                        <li class="uk-nav-divider"></li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span data-uk-icon="icon: sign-out"></span> &nbsp; Logout</a>
                                        </li>
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                        <li>
                            <a href="#cart-offcanvas" class="uk-icon" aria-expanded="false" uk-toggle>
                                <i uk-icon="icon: cart"></i>  &nbsp;  <span class="uk-label uk-label-success uk-border-rounded"> {{ count(LaraCart::getItems()) }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

<!-- This is the off-canvas -->
<div id="cart-offcanvas" uk-offcanvas="overlay: true; flip: true">
    <aside class="uk-offcanvas-bar uk-padding-remove uk-offcanvas-bar-animation uk-offcanvas-slide tm-cart-offcanvas">
        <div class="uk-card uk-card-secondary uk-card-small uk-height-1-1 uk-flex uk-flex-column tm-shadow-remove">
            <header class="uk-card-header uk-flex uk-flex-middle">
                <div class="uk-grid-small uk-flex-1 uk-grid" uk-grid="">
                    <div class="uk-width-expand uk-first-column">
                        <div class="uk-h3 uk-dark">Cart</div>
                    </div>
                    <button class="uk-offcanvas-close" type="button" uk-close></button>
                </div>
            </header>
            <div class="uk-card-body uk-overflow-auto">
                <ul class="uk-list uk-list-divider">
                    @foreach($items = LaraCart::getItems() as $item)
                        <li class="uk-visible-toggle">
                            <article>
                                <div class="uk-grid-small uk-grid" uk-grid>
                                    <div class="uk-width-expand">
                                        <div class="uk-text-meta uk-text-xsmall">Food &amp; Drinks</div>
                                        <p>{{ $item->name }}</p>
                                        <div class="uk-margin-xsmall uk-grid-small uk-flex-middle uk-grid" uk-grid="">
                                            <div class="uk-text-bolder uk-text-small uk-first-column">{{ $item->currency }} {{ $item->price }}</div>
                                            <div class="uk-text-meta uk-text-xsmall">{{ $item->qty }} × {{ $item->price }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="uk-icon-link uk-text-danger" href="#" uk-icon="icon: close; ratio: .75" uk-tooltip="Remove" title="" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('cart-remove-{{ $item->getHash() }}').submit();"></a>
                                        <form id="cart-remove-{{ $item->getHash() }}" action="{{ route('website.cartRemove') }}" method="POST" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="hash" value="{{ $item->getHash() }}">
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            </div>
            <footer class="uk-card-footer">
                <div class="uk-grid-small uk-grid" uk-grid="">
                    <div class="uk-width-expand uk-text-muted uk-h4 uk-first-column">Fee</div>
                    <div class="uk-h4 uk-text-bolder">KES {{ LaraCart::getFee('serviceFee')->getAmount($format = false, $withTax = false) }}</div>
                </div>
                <div class="uk-grid-small uk-grid" uk-grid="">
                    <div class="uk-width-expand uk-text-muted uk-h4 uk-first-column">Total</div>
                    <div class="uk-h4 uk-text-bolder">KES {{ LaraCart::total($formatted = false, $withDiscount = true, $withTax = false, $withFees = true) }}</div>
                </div>
                <hr>
                <div class="uk-grid-small uk-child-width-1-1 uk-child-width-1-2@m uk-margin-small uk-grid" uk-grid>
                    <div class="uk-first-column">
                        <a class="uk-button uk-button-default uk-margin-small uk-width-1-1 uk-text-uppercase" href="{{ route('website.cart') }}">view cart</a>
                    </div>
                    <div>
                        <a class="uk-button uk-button-primary uk-margin-small uk-width-1-1 uk-text-uppercase" href="{{ route('website.checkout') }}">checkout</a>
                    </div>
                </div>
            </footer>
        </div>
    </aside>
    {{--<div class="uk-offcanvas-bar">--}}

        {{--<button class="uk-offcanvas-close" type="button" uk-close></button>--}}

    {{--</div>--}}
</div>

<div id="offcanvas-menu" uk-offcanvas="overlay: true;" class="uk-offcanvas uk-open">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column uk-text-center uk-offcanvas-bar-animation uk-offcanvas-slide">

        <button class="uk-offcanvas-close uk-close-large uk-close uk-icon" type="button" uk-close="">
            <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="close-large"><line fill="none" stroke="#000" stroke-width="1.4" x1="1" y1="1" x2="19" y2="19"></line>
                <line fill="none" stroke="#000" stroke-width="1.4" x1="19" y1="1" x2="1" y2="19"></line>
            </svg>
        </button>
    </div>
</div>
