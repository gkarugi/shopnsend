@extends('dashboard.layouts.app')

@section('page_title','Product Groupings')

@section('page_action')
    @can('create-grouping')
        <a href="{{ route('productGroupings.create') }}" class="btn btn-info">Create Grouping</a>
    @endcan
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product Groupings</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap" id="groupings-table">
                        <thead>
                            <tr>
                                <th class="w-1">Grouping ID.</th>
                                <th>Name</th>
                                <th>Status</th>
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
@stop

@push('scripts')
    <script>
        $(function() {
            $('#groupings-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('productGroupings.index') !!}',
                columns: [
                    { name: 'id' },
                    { name: 'name' },
                    { name: 'active' },
                    { name: 'created_at' },
                    { name: 'updated_at' },
                    { name: 'action', orderable: false, searchable: false },
                    { name: 'edit', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush

