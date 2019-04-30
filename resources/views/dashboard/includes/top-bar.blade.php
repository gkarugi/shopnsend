<div class="header py-4">
    <div class="container">
        <div class="d-flex">
            <a class="header-brand" href="#">
                <img src="{{ asset('logo.svg') }}" class="header-brand-img" alt="{{ config('app.name') }} logo">
            </a>

            <div class="d-flex order-lg-2 ml-auto">
                <div class="nav-item d-none d-md-flex">
                    <a href="{{ route('website.home') }}" class="btn btn-sm btn-outline-primary" target="_blank">Website</a>
                </div>
                <div class="dropdown">
                    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                        <span class="avatar" style="background-image: url({{ asset('user.png') }})"></span>
                        <span class="ml-2 d-none d-lg-block">
							<span class="text-default">
                                @auth
                                    {{ auth()->user()->name }}
                                @else
                                    Guest
                                @endauth
                            </span>
							<small class="text-muted d-block mt-1">
                                @auth
                                    {{ auth()->user()->roles()->first()->name }}
                                @else
                                    Guest
                                @endauth
                            </small>
						</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        @auth
{{--                            <a class="dropdown-item" href="#">--}}
{{--                                <i class="dropdown-icon fe fe-user"></i> Profile--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item" href="#">--}}
{{--                                <i class="dropdown-icon fe fe-help-circle"></i> Need help?--}}
{{--                            </a>--}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                <i class="dropdown-icon fe fe-log-out"></i> {{ __('Sign out') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth
                    </div>
                </div>
            </div>

            <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
            </a>
        </div>
    </div>
</div>
