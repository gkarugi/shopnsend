@extends('dashboard.layouts.app')

@section('page_title','Stores')

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Stores</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th class="w-1">Store ID.</th>
                                <th>Name</th>
                                <th>Owner</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stores as $store)
                                <tr>
                                    <td><span class="text-muted">{{ $store->id }}</span></td>
                                    <td>{{ $store->name }}</td>
                                    <td>
                                        <a href="#" class="text-inherit">{{ $store->owner->name }}</a>
                                    </td>
                                    <td>
                                        {{ $store->created_at->toFormattedDateString() }}
                                    </td>
                                    <td>
                                        @if($store->active)
                                            <span class="status-icon bg-success"></span> active
                                        @else
                                            <span class="status-icon bg-danger"></span> inactive
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('dashboard.admin.branches.index', $store) }}" class="btn btn-secondary btn-sm">Branches</a>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="icon" href="{{ route('dashboard.admin.stores.edit', $store) }}">
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
