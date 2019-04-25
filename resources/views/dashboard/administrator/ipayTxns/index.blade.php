@extends('dashboard.layouts.app')

@section('page_title','Ipay Transactions')

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ipay Transactions</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap" id="ipayTxns-table">
                        <thead>
                            <tr>
                                <th class="w-1">TXN Code</th>
                                <th>Order ID</th>
                                <th>Invoice ID</th>
                                <th>Amount</th>
                                <th>Registered Name</th>
                                <th>Registered Number</th>
                                <th>Channel</th>
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
            $('#ipayTxns-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.ipayTxns.index') !!}',
                columns: [
                    { name: 'txn_code' },
                    { name: 'order_number' },
                    { name: 'invoice_number' },
                    { name: 'amount' },
                    { name: 'registered_name' },
                    { name: 'registered_number' },
                    { name: 'channel' },
                    { name: 'created_at' },
                    { name: 'updated_at' },
                ]
            });
        });
    </script>
@endpush

