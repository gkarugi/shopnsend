<div class="uk-container">
    <nav class="uk-navbar-container uk-navbar-transparent uk-navbar" uk-navbar style="min-height: 80px">
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
                <span>Shop nad Send</span>
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
        {{--<div class="uk-navbar-right">--}}
            {{--<ul class="uk-navbar-nav">--}}
                {{--<li>--}}
                    {{--<a href="#" class="uk-navbar-toggle uk-navbar-toggle-icon uk-icon uk-open" aria-expanded="false">--}}
                        {{--<span class="uk-margin-small-right uk-icon" uk-icon="user">--}}
                            {{--<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="user">--}}
                                {{--<circle fill="none" stroke="#000" stroke-width="1.1" cx="9.9" cy="6.4" r="4.4"></circle>--}}
                                {{--<path fill="none" stroke="#000" stroke-width="1.1" d="M1.5,19 C2.3,14.5 5.8,11.2 10,11.2 C14.2,11.2 17.7,14.6 18.5,19.2"></path>--}}
                            {{--</svg>--}}
                        {{--</span> @auth Account @endauth--}}
                    {{--</a>--}}
                    {{--<div class="uk-navbar-dropdown">--}}
                        {{--<ul class="uk-nav uk-navbar-dropdown-nav">--}}
                            {{--@guest--}}
                                {{--<li>--}}
                                    {{--<a href="{{ route('login') }}">Login</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="{{ route('register') }}">Register</a>--}}
                                {{--</li>--}}
                            {{--@endguest--}}
                            {{--<li class="uk-nav-divider"></li>--}}
                            {{--@auth--}}
                            {{--<li>--}}
                                {{--<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span data-uk-icon="icon: sign-out"></span> Logout</a>--}}
                            {{--</li>--}}
                            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                {{--@csrf--}}
                            {{--</form>--}}
                            {{--@endauth--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    </nav>
</div>
{{--<button class="uk-button uk-button-primary" type="button" uk-toggle="target: #offcanvas-menu">Button Test</button>--}}

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
