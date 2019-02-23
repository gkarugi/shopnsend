@extends('dashboard.layouts.app')

@section('page_title','Stores')

@section('page_action')
    <a href="{{ route('dashboard.admin.stores.index') }}" class="btn btn-info">All</a>
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Store</h3>
                </div>
                <form action="{{ route('dashboard.admin.stores.store') }}" method="POST">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="store_name" class="form-label">Store Name</label>
                                    <input type="text" id="store_name" name="store_name" class="form-control {{ $errors->has('store_name') ? ' is-invalid' : '' }}" placeholder="Store Name" value="{{ old('store_name') }}" required autofocus>
                                    @if ($errors->has('store_name'))
                                        <div class="invalid-feedback">{{ $errors->first('store_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="owner_name" class="form-label">Owner Name</label>
                                    <input type="text" id="owner_name" name="owner_name" class="form-control {{ $errors->has('owner_name') ? ' is-invalid' : '' }}" placeholder="Owner Name" value="{{ old('owner_name') }}" required>
                                    @if ($errors->has('owner_name'))
                                        <div class="invalid-feedback">{{ $errors->first('owner_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="owner_email" class="form-label">Owner E-mail</label>
                                    <input type="email" id="owner_email" name="owner_email" class="form-control {{ $errors->has('owner_email') ? ' is-invalid' : '' }}" placeholder="Owner E-mail" value="{{ old('owner_email') }}" required>
                                    @if ($errors->has('owner_email'))
                                        <div class="invalid-feedback">{{ $errors->first('owner_email') }}</div>
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