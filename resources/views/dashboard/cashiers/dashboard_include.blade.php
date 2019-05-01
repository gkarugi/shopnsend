<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body text-center">
                <div class="h5">Total redeemed items</div>
                <div class="display-4 font-weight-bold mb-4">{{ $metrics->cashier()['sumItems'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body text-center">
                <div class="h5">Total Redeemed Value</div>
                <div class="display-4 font-weight-bold mb-4">{{ $metrics->cashier()['sumRevenue'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body text-center">
                <div class="h5">Total Redeemed Products</div>
                <div class="display-4 font-weight-bold mb-4">{{ $metrics->cashier()['sumProducts'] }}</div>
            </div>
        </div>
    </div>
</div>
