@extends('dashboard.layouts.app')

@section('page_title','Receipts')

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Receipts</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap" id="receipts-table">
                        <thead>
                            <tr>
                                <th class="w-1">Receipt ID.</th>
                                <th>Invoice ID</th>
                                <th>Amount</th>
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
            $('#receipts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.receipts.index') !!}',
                columns: [
                    { name: 'receipt_number' },
                    { name: 'invoice.invoice_number' },
                    { name: 'amount' },
                    { name: 'currency' },
                    { name: 'created_at' },
                    { name: 'updated_at' },
                ]
            });
        });
    </script>
@endpush

