@extends('dashboard.layouts.app')

@section('page_title', 'Redeemed Products')

@section('page_action')
    <a href="{{ route('pos.index') }}" class="btn btn-info">Complete</a>
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            @if(count($items) > 0 )
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th class="w-1">Order ID.</th>
                                <th>Product Name</th>
                                <th>Store Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Redeemed at</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td><span class="text-muted">{{ $item->orderItem->order->number }}</span></td>
                                    <td>{{ $item->orderItem->product->name }}</td>
                                    <td>{{ $item->orderItem->product->store->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->orderItem->currency }} {{ $item->orderItem->price }}</td>
                                    <td>
                                        {{ $item->created_at->toFormattedDateString() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop

