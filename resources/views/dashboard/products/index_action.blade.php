@can('update-product')
    <a href="{{ route('products.feature', $product) }}" class="btn btn-secondary btn-sm"
       onclick="event.preventDefault();
           document.getElementById('feature-form-{{ $product->id }}').submit();">@if($product->featured) Unfeature @else Feature @endif</a>
    <form id="feature-form-{{ $product->id }}" action="{{ route('products.feature', $product) }}" method="POST" style="display: none;">
        @csrf
    </form>
@endcan
<div class="dropdown">
    <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
</div>
