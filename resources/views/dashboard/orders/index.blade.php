@extends('dashboard.layouts.app')

@section('page_title','Store Orders')

@section('page_action')
    <form>
        <div class="form-group" style="margin-right: 25px">
            <div class="row">
                <label for="selected_store" class="form-label col-auto align-middle" style="margin-top: 8px;">Orders for </label>
                <select name="selected_store" id="selected_store" class="form-control col" onchange="event.preventDefault();
                                window.open('{{ route('orders.index', ['store' => $store]) }}','_self');">
                    <option value=""></option>
                    @foreach(auth()->user()->stores as $myStore)
                        <option value="{{ $myStore->id }}" @if($myStore->is($store)) selected @endif>{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-auto">
            <a href="{{ route('stores.index') }}" class="btn btn-info">All Stores</a>
        </div>
    </div>
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Store Orders - {{ $store->name }}</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap" id="orders-table">
                        <thead>
                            <tr>
                                <th class="w-1">Order ID.</th>
{{--                                <th>Name</th>--}}
{{--                                <th>Email</th>--}}
{{--                                <th>Phone</th>--}}
                                {{--<th>Total Amount</th>--}}
{{--                                <th>Paid</th>--}}
                                <th>Created</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script>
        $(function() {
            $('#orders-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('orders.index', ['store' => $store]) !!}',
                columns: [
                    { name: 'number' },
                    // { name: 'name' },
                    // { name: 'email' },
                    // { name: 'active' },
                    // { name: 'featured' },
                    { name: 'created_at' },
                    { name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush

