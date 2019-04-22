@extends('dashboard.layouts.app')

@section('page_title','Store Order # ' . $order->number)

@section('page_action')
    <a href="{{ route('admin.orders.index') }}" class="btn btn-info">All Orders</a>
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order Items</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                        <tr>
                            <th class="w-1">#.</th>
                            <th>Name</th>
                            <th>price</th>
                            <th>Redeemable Quantity</th>
                            <th>Code</th>
                            <th>Paid</th>
                            <th>Created</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td><span class="text-muted">{{ $loop->iteration }}</span></td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->redeemable_qty }}</td>
                                <td>{{ $item->code }}</td>
                                <td>
                                    @if($order->paid)
                                        <span class="status-icon bg-success"></span> paid
                                    @else
                                        <span class="status-icon bg-danger"></span> unpaid
                                    @endif
                                </td>
                                <td>
                                    {{ $order->created_at->toFormattedDateString() }}
                                </td>

                                <td class="text-right">
                                    {{--<a href="{{ route('orders.show',['store' => $store, 'order' => $order]) }}" class="btn btn-secondary btn-sm">View</a>--}}
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
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

