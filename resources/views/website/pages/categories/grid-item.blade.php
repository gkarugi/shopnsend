<div class="uk-width-1-1@s uk-width-1-3@m uk-width-1-4@l">
    <a href="{{ route('website.categories.show', $category) }}" class="uk-link-reset" title="{{ $category->name }}">
        <div class="uk-card uk-card-default uk-card-hover">
            <div class="uk-card-media-top">
                <img class="img" src="{{ ($category->getFirstMedia('main-images')) ? get_media_url($category->getFirstMedia('main-images')) : '#' }}" alt="{{ $category->name }}">
            </div>
            <div class="uk-card-body">
                <div>
                    <h4 class="uk-text-bold">{{ $category->name }}</h4>
                    <p>{{ $category->description }}</p>
                </div>
            </div>
            <div class="uk-card-footer">
                <p class="uk-text-muted">{{ count($category->products) . ' Meals' }}</p>
            </div>
        </div>
    </a>
</div>
