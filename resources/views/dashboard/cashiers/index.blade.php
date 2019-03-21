@extends('dashboard.layouts.app')

@section('page_title','Store Branch Cashiers')

@section('page_action')
    @can('create-cashier')
        <a href="{{ route('cashiers.create', ['store' => $store, 'branch' => $branch]) }}" class="btn btn-info">Create Cashier</a> &nbsp
    @endcan

    <a href="{{ route('branches.index', ['store' => $store]) }}" class="btn btn-info">All Branches</a>
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Store Branch Cashiers</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th class="w-1">Branch ID.</th>
                                <th>Name</th>
                                <th>Created</th>
                                <th>Given access at</th>
                                <th>Settings updated at</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cashiers as $cashier)
                                <tr>
                                    <td><span class="text-muted">{{ $cashier->user->id }}</span></td>
                                    <td>{{ $cashier->user->name }}</td>
                                    <td>
                                        {{ $cashier->user->created_at->toFormattedDateString() }}
                                    </td>
                                    <td>
                                        {{ $cashier->created_at->toFormattedDateString() }}
                                    </td>
                                    <td>
                                        {{ $cashier->updated_at->toFormattedDateString() }}
                                    </td>
                                    <td>
                                        @if($cashier->active)
                                            <span class="status-icon bg-success"></span> active
                                        @else
                                            <span class="status-icon bg-danger"></span> inactive
                                        @endif
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

