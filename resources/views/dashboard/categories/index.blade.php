@extends('dashboard.layouts.app')

@section('page_title','Product Categories')

@section('page_action')
    @can('create-category')
        <a href="{{ route('categories.create') }}" class="btn btn-info">Create Category</a>
    @endcan
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product Categories</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th class="w-1">Category ID.</th>
                                <th>Name</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td><span class="text-muted">{{ $category->id }}</span></td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        {{ $category->created_at->toFormattedDateString() }}
                                    </td>
                                    <td>
                                        @if($category->active)
                                            <span class="status-icon bg-success"></span> active
                                        @else
                                            <span class="status-icon bg-danger"></span> inactive
                                        @endif
                                    </td>
                                    <td>
                                        @if($category->featured)
                                            <span class="status-icon bg-success"></span> featured
                                        @else
                                            <span class="status-icon bg-danger"></span> Unfeatured
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        {{--<a href="#" class="btn btn-secondary btn-sm">Branches</a>--}}
                                        @can('update-category')
                                            <a href="{{ route('categories.feature', $category) }}" class="btn btn-secondary btn-sm"
                                               onclick="event.preventDefault();
                                                   document.getElementById('feature-form-{{ $category->id }}').submit();">@if($category->featured) Unfeature @else Feature @endif</a>
                                            <form id="feature-form-{{ $category->id }}" action="{{ route('categories.feature', $category) }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        @endcan
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                                        </div>
                                    </td>
                                    <td>
                                        @can('update-category')
                                            <a class="icon" href="{{ route('categories.edit', $category) }}">
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

