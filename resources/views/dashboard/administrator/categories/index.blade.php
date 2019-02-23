@extends('dashboard.layouts.app')

@section('page_title','Product Categories')

@section('page_action')
    <a href="{{ route('dashboard.admin.categories.create') }}" class="btn btn-info">Create</a>
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
                                    <td class="text-right">
                                        <a href="#" class="btn btn-secondary btn-sm">Branches</a>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="icon" href="{{ route('dashboard.admin.categories.edit', $category) }}">
                                            <i class="fe fe-edit"></i>
                                        </a>
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

