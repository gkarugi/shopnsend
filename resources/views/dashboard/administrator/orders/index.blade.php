@extends('dashboard.layouts.app')

@section('page_title','Orders')

@section('page_action')
{{--    @can('create-product')--}}
{{--        <a href="{{ route('products.create') }}" class="btn btn-info">Create Product</a>--}}
{{--    @endcan--}}
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Orders</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap" id="orders-table">
                        <thead>
                            <tr>
                                <th class="w-1">Order ID.</th>
                                <th>Buyer</th>
                                <th>Receiver</th>
                                <th>Receiver Phone</th>
                                <th>Fee</th>
                                <th>Amount</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Updated</th>
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
                ajax: '{!! route('admin.orders.index') !!}',
                columns: [
                    { name: 'number' },
                    { name: 'user.name' },
                    { name: 'receiver_name' },
                    { name: 'receiver_phone' },
                    { name: 'fee' },
                    { name: 'amount' },
                    { name: 'amountPayable' },
                    { name: 'paid' },
                    { name: 'created_at' },
                    { name: 'updated_at' },
                    { name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush

