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
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th class="w-1">Product ID.</th>
                                <th>Name</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td><span class="text-muted">{{ $product->id }}</span></td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        {{ $product->created_at->toFormattedDateString() }}
                                    </td>
                                    <td>
                                        @if($product->active)
                                            <span class="status-icon bg-success"></span> active
                                        @else
                                            <span class="status-icon bg-danger"></span> inactive
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        {{--<a href="#" class="btn btn-secondary btn-sm">Branches</a>--}}
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                                        </div>
                                    </td>
                                    <td>
                                        @can('update-product')
                                            <a class="icon" href="{{ route('products.edit', $product) }}">
                                                <i class="fe fe-edit"></i>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

