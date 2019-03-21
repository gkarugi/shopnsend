@extends('dashboard.layouts.app')

@section('page_title','Store Branch Cashiers')

@section('page_action')
    <a href="{{ route('cashiers.index', ['store' => $store, 'branch' => $branch]) }}" class="btn btn-info">All Cashiers</a>
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Store Branch Cashier</h3>
                </div>
                <form action="{{ route('cashiers.store', ['store' => $store, 'branch' => $branch]) }}" method="POST">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="form-label">Cashier Name</label>
                                    <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Cashier Name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Cashier Email</label>
                                    <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Cashier Email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
