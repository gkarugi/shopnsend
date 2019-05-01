<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body text-center">
                <div class="h5">Current Account Balance</div>
                <div class="display-4 font-weight-bold mb-4">KES {{ $metrics->storeOwner()['balance'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body text-center">
                <div class="h5">Complete Orders</div>
                <div class="display-4 font-weight-bold mb-4">{{ $metrics->storeOwner()['completeOrders'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body text-center">
                <div class="h5">Incomplete Orders</div>
                <div class="display-4 font-weight-bold mb-4">{{ $metrics->storeOwner()['incompleteOrders'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body text-center">
                <div class="h5">Number of Branches</div>
                <div class="display-4 font-weight-bold mb-4">{{ $metrics->storeOwner()['branches'] }}</div>
            </div>
        </div>
    </div>
</div>
