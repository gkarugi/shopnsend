<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body text-center">
                <div class="h5">Account Balance</div>
                <div class="display-4 font-weight-bold mb-4">KES {{ $metrics->administrator()['balance'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body text-center">
                <div class="h5">Complete Orders</div>
                <div class="display-4 font-weight-bold mb-4">{{ $metrics->administrator()['completeOrders'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body text-center">
                <div class="h5">Incomplete Orders</div>
                <div class="display-4 font-weight-bold mb-4">{{ $metrics->administrator()['incompleteOrders'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body text-center">
                <div class="h5">Number of Stores</div>
                <div class="display-4 font-weight-bold mb-4">{{ $metrics->administrator()['stores'] }}</div>
            </div>
        </div>
    </div>
</div>
