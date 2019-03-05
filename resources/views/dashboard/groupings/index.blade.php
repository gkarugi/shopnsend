@extends('dashboard.layouts.app')

@section('page_title','Product Groupings')

@section('page_action')
    <a href="{{ route('productGroupings.create') }}" class="btn btn-info">Create</a>
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product Groupings</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th class="w-1">Grouping ID.</th>
                                <th>Name</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groupings as $grouping)
                                <tr>
                                    <td><span class="text-muted">{{ $grouping->id }}</span></td>
                                    <td>{{ $grouping->name }}</td>
                                    <td>
                                        {{ $grouping->created_at->toFormattedDateString() }}
                                    </td>
                                    <td>
                                        @if($grouping->active)
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
                                        <a class="icon" href="{{ route('productGroupings.edit', $grouping) }}">
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

