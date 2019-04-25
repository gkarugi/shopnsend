@can('update-category')
    <a href="{{ route('categories.feature', $category) }}" class="btn btn-secondary btn-sm"
       onclick="event.preventDefault();
           document.getElementById('feature-form-{{ $category->id }}').submit();">@if($category->featured) Unfeature @else Feature @endif</a>
    <form id="feature-form-{{ $category->id }}" action="{{ route('categories.feature', $category) }}" method="POST" style="display: none;">
        @csrf
    </form>
@endcan

<div class="dropdown">
    <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
</div>
