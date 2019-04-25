@extends('dashboard.layouts.app')

@section('page_title','Invoices')

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Invoices</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap" id="invoices-table">
                        <thead>
                            <tr>
                                <th class="w-1">Invoice ID.</th>
                                <th>Order ID</th>
                                <th>Total Amount</th>
                                <th>Duse Amount</th>
                                <th>Excess Amount</th>
                                <th>Currency</th>
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
            $('#invoices-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.invoices.index') !!}',
                columns: [
                    { name: 'invoice_number' },
                    { name: 'order.number' },
                    { name: 'total_amount' },
                    { name: 'due_amount' },
                    { name: 'excess_amount' },
                    { name: 'currency' },
                    { name: 'created_at' },
                    { name: 'updated_at' },
                ]
            });
        });
    </script>
@endpush

