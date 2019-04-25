@extends('dashboard.layouts.app')

@section('page_title','Products')

@section('page_action')
    @can('create-product')
        <a href="{{ route('products.create') }}" class="btn btn-info">Create Product</a>
    @endcan
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap" id="products-table">
                        <thead>
                            <tr>
                                <th class="w-1">Product ID.</th>
                                <th>Name</th>
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
            $('#products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('products.index') !!}',
                columns: [
                    { name: 'id' },
                    { name: 'name' },
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

