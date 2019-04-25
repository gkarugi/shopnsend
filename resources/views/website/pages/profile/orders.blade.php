@extends('website.layouts.app')

@section('page_title', 'My Orders')

@section('content')
    <div class="uk-section">
        <div class="uk-container">
            <table class="uk-table uk-table-divider">
                <thead>
                <tr>
                    <th>Order ID.</th>
                    <th>Fee</th>
                    <th>Receiver name</th>
                    <th>Receiver phone</th>
                    <th>Amount</th>
                    <th>Paid</th>
                    <th>Created</th>
                    <th>Updated At</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->number }}</td>
                            <td>{{ $order->currency }} {{ $order->fee }}</td>
                            <td>{{ $order->receiver_name }}</td>
                            <td>{{ $order->receiver_phone }}</td>
                            <td>{{ $order->currency }} {{ $order->invoice->total_amount }}</td>
                            <td>@if($order->paid) <span class="uk-label-success uk-border-rounded">Paid</span> @else <span class="uk-label-danger uk-border-rounded">Not paid</span> @endif</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
