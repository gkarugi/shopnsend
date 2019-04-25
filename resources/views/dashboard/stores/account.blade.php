@extends('dashboard.layouts.app')

@section('page_title', 'Store Account - ' . request()->route('store')->name)

@section('page')
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="h5">Today's Income</div>
                    <div class="display-4 font-weight-bold mb-4">{{ $store->currency }} {{ $todayIncome }}</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="h5">Store Balance</div>
                    <div class="display-4 font-weight-bold mb-4">{{ $store->currency }} {{ $store->account_balance }}</div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row row-cards row-deck">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Account Activity</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" id="stores-table">
                                <thead>
                                <tr>
                                    <th>Currency</th>
                                    <th>Current Balance</th>
                                    <th>amount</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script>
        $(function() {
            $('#stores-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('stores.account', request()->route('store')) !!}',
                columns: [
                    { name: 'currency' },
                    { name: 'current_balance' },
                    { name: 'amount' },
                    { name: 'created_at' },
                    { name: 'updated_at' },
                ]
            });
        });
    </script>
@endpush


