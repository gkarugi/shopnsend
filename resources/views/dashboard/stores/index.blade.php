@extends('dashboard.layouts.app')

@section('page_title','Stores')

@section('page_action')
    @can('create-store')
        <a href="{{ route('stores.create') }}" class="btn btn-info">Create</a>
    @endcan
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Stores</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable" id="stores-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Featured</th>
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
            $('#stores-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('stores.index') !!}',
                columns: [
                    { name: 'name' },
                    { name: 'email' },
                    { name: 'active' },
                    { name: 'featured' },
                    { name: 'created_at' },
                    { name: 'updated_at' },
                    { name: 'action', orderable: false, searchable: false },
                    { name: 'edit', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush

