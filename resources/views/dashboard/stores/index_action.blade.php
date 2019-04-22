<a href="{{ route('branches.index', $store) }}" class="btn btn-secondary btn-sm">Branches</a>
@can('update-store')
    <a href="{{ route('stores.feature', $store) }}" class="btn btn-secondary btn-sm"
       onclick="event.preventDefault();
           document.getElementById('feature-form-{{ $store->id }}').submit();">@if($store->featured) Unfeature @else Feature @endif</a>
    <form id="feature-form-{{ $store->id }}" action="{{ route('stores.feature', $store) }}" method="POST" style="display: none;">
        @csrf
    </form>
@endcan
