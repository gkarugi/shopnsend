@extends('dashboard.layouts.app')

@section('page_title','Store Branches')

@section('page_action')
    <a href="{{ route('branches.create', $store) }}" class="btn btn-info">Create</a>
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Store Branches</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th class="w-1">Branch ID.</th>
                                <th>Name</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($branches as $branch)
                                <tr>
                                    <td><span class="text-muted">{{ $branch->id }}</span></td>
                                    <td>{{ $branch->name }}</td>
                                    <td>
                                        {{ $branch->created_at->toFormattedDateString() }}
                                    </td>
                                    <td>
                                        @if($branch->active)
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
                                        <a class="icon" href="{{ route('branches.edit', ['store' => $store, 'branch' => $branch]) }}">
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

