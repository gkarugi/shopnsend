<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 ml-auto">
                <form class="input-icon my-3 my-lg-0">
                    <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                    <div class="input-icon-addon">
                        <i class="fe fe-search"></i>
                    </div>
                </form>
            </div>
            <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                    <?php $menu = \App\MenuHelper::dashboard(true); ?>

                    @foreach($menu as $menuItem)
                        <li class="nav-item @if(isset($menuItem['children'])) dropdown @endif">
                            <a href="{{ $menuItem['route'] }}" class="nav-link @if(url()->current() == $menuItem['route']) active @endif" @if(isset($menuItem['children'])) data-toggle="dropdown" @endif><i class="{{ $menuItem['icon'] }}"></i> {{ $menuItem['text'] }}</a>
                            @if(isset($menuItem['children']))
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    @foreach($menuItem['children'] as $childItem)
                                        <a href="{{ $childItem['route'] }}" class="dropdown-item ">{{ $childItem['text'] }}</a>
                                    @endforeach
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>