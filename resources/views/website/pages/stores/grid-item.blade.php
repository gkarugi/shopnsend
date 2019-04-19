<div class="uk-width-1-1@s uk-width-1-3@m uk-width-1-3@l">
    <a href="{{ route('website.stores.show', $store) }}" class="uk-link-reset" title="{{ $store->name }}">
        <div class="uk-card uk-card-default uk-card-hover">
            <div class="uk-card-media-top">
                <img class="img" src="{{ ($store->getFirstMedia('main-images')) ? get_media_url($store->getFirstMedia('main-images')) : '#' }}" alt="{{ $store->name }}">
            </div>
            <div class="uk-card-body">
                <div>
                    <h4 class="uk-text-bold">{{ $store->name }}</h4>
                    <p>{{ $store->description }}</p>
                </div>
            </div>
            {{--<div class="uk-card-footer">--}}
                {{--<p class="uk-text-muted">{{ count($store->products) . \Illuminate\Support\Str::plural(' Meal', count($store->products)) }} | {{ count($store->branches) . \Illuminate\Support\Str::plural(' Location', count($store->branches)) }}</p>--}}
            {{--</div>--}}
        </div>
    </a>
</div>
