<div class="uk-width-1-1@s uk-width-1-3@m uk-width-1-4@l">
    <a href="{{ route('website.products.show', $product) }}" class="uk-link-reset" title="{{ $product->name }}">
        <div class="uk-card uk-card-default uk-card-hover">
            <div class="uk-card-media-top">
                <img class="img" src="{{ ($product->getFirstMedia('main-images')) ? get_media_url($product->getFirstMedia('main-images')) : '#' }}" alt="{{ $product->name }}">
            </div>
            <div class="uk-card-body">
                <div>
                    <h4 class="uk-text-bold">{{ $product->name }}</h4>
                    <p class="uk-text-bold">{{ $product->currency }} {{ $product->price }}</p>
                    <p>{{ $product->description }}</p>
                </div>
            </div>
            <div class="uk-card-footer">
                <div class="uk-margin-remove-top">
                    <div class="uk-text-right">
                        <a href="{{ route('website.cartAdd', $product) }}" class="uk-button uk-button-primary uk-button-small" onclick="event.preventDefault(); document.getElementById('cart-add-{{ $product->id }}').submit();"><span uk-icon="icon: cart; ratio: .75"></span> Buy</a>
                        <form id="cart-add-{{ $product->id }}" action="{{ route('website.cartAdd', $product) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </a>
</div>
