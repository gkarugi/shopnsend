@extends('dashboard.layouts.app')

@section('page_title', 'Point of Sale')

{{--@section('page_action')--}}
    {{--<a href="{{ route('products.create') }}" class="btn btn-info">Create</a>--}}
{{--@stop--}}

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <form action="" method="get">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" name="code" value="{{ request()->code }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Code" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

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
                                <th>Available Quantity</th>
                                <th>Price</th>
                                <th>Ordered at</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td><span class="text-muted">{{ $item->order->number }}</span></td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->product->store->name }}</td>
                                    <td>{{ $item->redeemable_qty }}</td>
                                    <td>{{ $item->currency }} {{ $item->price }}</td>
                                    <td>
                                        {{ $item->order->created_at->toFormattedDateString() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            @if(count($items) > 0)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Checkout</h3>
                    </div>
                    <form action="{{ route('pos.redeemItems') }}" method="post">
                        @csrf
                        <input type="hidden" name="code" value="{{ $items->first()->code }}">

                        {{--<div class="card-body">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-12">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="code">Code</label>--}}
                                        {{--<input type="text" name="code" value="{{ old('code') }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Code" required autofocus>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Checkout</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
@stop

