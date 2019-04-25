@if($order->paid)
    <span class="status-icon bg-success"></span> paid
@else
    <span class="status-icon bg-danger"></span> unpaid
@endif
