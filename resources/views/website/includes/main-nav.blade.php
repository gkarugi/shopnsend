<header data-uk-sticky="animation: uk-animation-slide-top">
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
                <div class="uk-navbar-center">
                    <a href="../" class="uk-navbar-item uk-logo uk-hidden@s">
                        {{--<img uk-svg="" src="" class="uk-margin-small-right uk-padding-small" width="215">--}}
                        <span>Shop and Send</span>
                    </a>
                    <ul class="uk-navbar-nav uk-visible@s">
                        <?php $menu = \App\MenuHelper::website(true); ?>

                        @foreach($menu as $menu_item)
                            @if(isset($menu_item['children']))
                                <li>
                                    <a href="#"> <i uk-icon="icon: chevron-down" ></i>{{ $menu_item['text'] }}</a>
                                    <div class="uk-navbar-dropdown">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            @foreach($menu_item['children'] as $child_menu)
                                            <li>
                                                <a href="{{ $child_menu['route'] }}">{{ $child_menu['text'] }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $menu_item['route'] }}">{{ $menu_item['text'] }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="uk-navbar-right">
                    @guest
                        <div class="uk-navbar-item uk-visible@m">
                            <a href="#login-register" class="uk-button uk-button-danger tm-button-default uk-text-uppercase uk-text-bold" uk-toggle>Login / Register</a>
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
                                        <li>
                                            <a href=""><span data-uk-icon="icon: list"></span> &nbsp;    My Orders</a>
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
                                <i uk-icon="icon: cart"></i> &nbsp; Cart
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

{{--<div id="cart-offcanvas" uk-offcanvas="overlay: true; flip: true" class="uk-offcanvas uk-offcanvas-overlay uk-open"--}}
     {{--style="display: block;">--}}
    {{--<aside class="uk-offcanvas-bar uk-padding-remove uk-offcanvas-bar-animation uk-offcanvas-slide">--}}
        {{--<div class="uk-card uk-card-default uk-card-small uk-height-1-1 uk-flex uk-flex-column tm-shadow-remove">--}}
            {{--<header class="uk-card-header uk-flex uk-flex-middle">--}}
                {{--<div class="uk-grid-small uk-flex-1 uk-grid" uk-grid="">--}}
                    {{--<div class="uk-width-expand uk-first-column">--}}
                        {{--<div class="uk-h3">Cart</div>--}}
                    {{--</div>--}}
                    {{--<button class="uk-offcanvas-close uk-close uk-icon" type="button" uk-close="">--}}
                        {{--<svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">--}}
                            {{--<line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line>--}}
                            {{--<line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line>--}}
                        {{--</svg>--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</header>--}}
            {{--<div class="uk-card-body uk-overflow-auto">--}}
                {{--<ul class="uk-list uk-list-divider">--}}
                    {{--<li class="uk-visible-toggle">--}}
                        {{--<arttcle>--}}
                            {{--<div class="uk-grid-small uk-grid" uk-grid="">--}}
                                {{--<div class="uk-width-1-4 uk-first-column">--}}
                                    {{--<div class="tm-ratio tm-ratio-4-3"><a class="tm-media-box" href="product.html">--}}
                                            {{--<figure class="tm-media-box-wrap"><img src="images/products/1/1-small.jpg"--}}
                                                                                   {{--alt="Apple MacBook Pro 15&quot; Touch Bar MPTU2LL/A 256GB (Silver)">--}}
                                            {{--</figure>--}}
                                        {{--</a></div>--}}
                                {{--</div>--}}
                                {{--<div class="uk-width-expand">--}}
                                    {{--<div class="uk-text-meta uk-text-xsmall">Laptop</div>--}}
                                    {{--<a class="uk-link-heading uk-text-small" href="product.html">Apple MacBook Pro 15"--}}
                                        {{--Touch Bar MPTU2LL/A 256GB (Silver)</a>--}}
                                    {{--<div class="uk-margin-xsmall uk-grid-small uk-flex-middle uk-grid" uk-grid="">--}}
                                        {{--<div class="uk-text-bolder uk-text-small uk-first-column">$1599.00</div>--}}
                                        {{--<div class="uk-text-meta uk-text-xsmall">1 × $1599.00</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div><a class="uk-icon-link uk-text-danger uk-invisible-hover uk-icon" href="#"--}}
                                        {{--uk-icon="icon: close; ratio: .75" uk-tooltip="Remove" title=""--}}
                                        {{--aria-expanded="false">--}}
                                        {{--<svg width="15" height="15" viewBox="0 0 20 20"--}}
                                             {{--xmlns="http://www.w3.org/2000/svg">--}}
                                            {{--<path fill="none" stroke="#000" stroke-width="1.06" d="M16,16 L4,4"></path>--}}
                                            {{--<path fill="none" stroke="#000" stroke-width="1.06" d="M16,4 L4,16"></path>--}}
                                        {{--</svg>--}}
                                    {{--</a></div>--}}
                            {{--</div>--}}
                        {{--</arttcle>--}}
                    {{--</li>--}}
                    {{--<li class="uk-visible-toggle">--}}
                        {{--<arttcle>--}}
                            {{--<div class="uk-grid-small uk-grid" uk-grid="">--}}
                                {{--<div class="uk-width-1-4 uk-first-column">--}}
                                    {{--<div class="tm-ratio tm-ratio-4-3"><a class="tm-media-box" href="product.html">--}}
                                            {{--<figure class="tm-media-box-wrap"><img src="images/products/2/2-small.jpg"--}}
                                                                                   {{--alt="Apple MacBook 12&quot; MNYN2LL/A 512GB (Rose Gold)">--}}
                                            {{--</figure>--}}
                                        {{--</a></div>--}}
                                {{--</div>--}}
                                {{--<div class="uk-width-expand">--}}
                                    {{--<div class="uk-text-meta uk-text-xsmall">Laptop</div>--}}
                                    {{--<a class="uk-link-heading uk-text-small" href="product.html">Apple MacBook 12"--}}
                                        {{--MNYN2LL/A 512GB (Rose Gold)</a>--}}
                                    {{--<div class="uk-margin-xsmall uk-grid-small uk-flex-middle uk-grid" uk-grid="">--}}
                                        {{--<div class="uk-text-bolder uk-text-small uk-first-column">$1549.00</div>--}}
                                        {{--<div class="uk-text-meta uk-text-xsmall">1 × $1549.00</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div><a class="uk-icon-link uk-text-danger uk-invisible-hover uk-icon" href="#"--}}
                                        {{--uk-icon="icon: close; ratio: .75" uk-tooltip="Remove" title=""--}}
                                        {{--aria-expanded="false">--}}
                                        {{--<svg width="15" height="15" viewBox="0 0 20 20"--}}
                                             {{--xmlns="http://www.w3.org/2000/svg">--}}
                                            {{--<path fill="none" stroke="#000" stroke-width="1.06" d="M16,16 L4,4"></path>--}}
                                            {{--<path fill="none" stroke="#000" stroke-width="1.06" d="M16,4 L4,16"></path>--}}
                                        {{--</svg>--}}
                                    {{--</a></div>--}}
                            {{--</div>--}}
                        {{--</arttcle>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<footer class="uk-card-footer">--}}
                {{--<div class="uk-grid-small uk-grid" uk-grid="">--}}
                    {{--<div class="uk-width-expand uk-text-muted uk-h4 uk-first-column">Subtotal</div>--}}
                    {{--<div class="uk-h4 uk-text-bolder">$3148.00</div>--}}
                {{--</div>--}}
                {{--<div class="uk-grid-small uk-child-width-1-1 uk-child-width-1-2@m uk-margin-small uk-grid" uk-grid="">--}}
                    {{--<div class="uk-first-column"><a class="uk-button uk-button-default uk-margin-small uk-width-1-1"--}}
                                                    {{--href="cart.html">view cart</a></div>--}}
                    {{--<div><a class="uk-button uk-button-primary uk-margin-small uk-width-1-1" href="checkout.html">checkout</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</footer>--}}
        {{--</div>--}}
    {{--</aside>--}}
{{--</div>--}}

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
                    <div class="uk-width-expand uk-text-muted uk-h4 uk-first-column">Subtotal</div>
                    <div class="uk-h4 uk-text-bolder">KES {{ LaraCart::subTotal($formatted = false, $withDiscount = false) }}</div>
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

        <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical uk-nav-parent-icon" uk-nav="">
            @foreach($menu as $menu_item)
                @if(isset($menu_item['children']))
                    <li class="uk-parent">
                        <a href="{{ $menu_item['route'] }}">{{ $menu_item['text'] }}</a>
                        <ul class="uk-nav-sub" hidden="" aria-hidden="true">
                            @foreach($menu_item['children'] as $child_menu)
                                <li>
                                    <a href="{{ $child_menu['route'] }}">{{ $child_menu['text'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li><a href="{{ $menu_item['route'] }}">{{ $menu_item['text'] }}</a></li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
