<div class="uk-width-1-1@s uk-width-1-3@m uk-width-1-4@l">
    <div class="uk-card uk-card-default uk-card-hover">
        <div class="uk-card-media-top">
            <a href="{!! $actionLink !!}" title="{{ $title }} safari">
                <img class="img" src="{{ $slot }}" alt="{{ $imageAlt }}">
            </a>
        </div>
        <div class="uk-card-body">
            <div>
                <a class="uk-link-reset" href="{{ $actionLink }}" title="View {{ $title }} safari">
                    <div class="tagline uk-text-warning">{{ isset($tagline) ? $tagline : ''  }}</div>
                    <h3 class="card-name-title">{{ $title }}</h3>
                </a>
            </div>
            {{--<div class="price-wrapper">--}}
                {{--<h2 class="product-price">$2</h2>--}}
            {{--</div>--}}
            {{--<h3 class="uk-card-title"></h3>--}}
            {{--<p></p>--}}
        </div>
    </div>
</div>