@extends('dashboard.layouts.app')

@section('page_title','Stores')

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Store - {{ $store->name }}</h3>
                </div>
                <form action="{{ route('dashboard.admin.stores.update', $store) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="store_name" class="form-label">Store Name</label>
                                    <input type="text" id="store_name" name="store_name" class="form-control {{ $errors->has('store_name') ? ' is-invalid' : '' }}" placeholder="Store Name" value="{{ $store->name }}" required autofocus>
                                    @if ($errors->has('store_name'))
                                        <div class="invalid-feedback">{{ $errors->first('store_name') }}</div>
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