@extends('dashboard.layouts.app')

@section('page_title','Store Orders')

@section('page_action')
    <a href="{{ route('orders.index',['store' => $store]) }}" class="btn btn-info">Store Orders</a>
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Store Order</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th class="w-1">Order ID.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Paid</th>
                                <th>Created</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--@foreach($orders as $order)--}}
                                <tr>
                                    <td><span class="text-muted">{{ $order->number }}</span></td>
                                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        @if($order->paid)
                                            <span class="status-icon bg-success"></span> active
                                        @else
                                            <span class="status-icon bg-danger"></span> inactive
                                        @endif
                                    </td>
                                    <td>
                                        {{ $order->created_at->toFormattedDateString() }}
                                    </td>

                                    <td class="text-right">
                                        <a href="{{ route('orders.show',['store' => $store, 'order' => $order]) }}" class="btn btn-secondary btn-sm">View</a>
                                        {{--<div class="dropdown">--}}
                                            {{--<button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>--}}
                                        {{--</div>--}}
                                    </td>
                                    <td>
                                        {{--@can('update-branch')--}}
                                            {{--<a class="icon" href="{{ route('branches.edit', ['store' => $store, 'branch' => $branch]) }}">--}}
                                                {{--<i class="fe fe-edit"></i>--}}
                                            {{--</a>--}}
                                        {{--@endcan--}}
                                    </td>
                                </tr>
                            {{--@endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

