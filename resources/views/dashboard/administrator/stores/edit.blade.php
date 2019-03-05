@extends('dashboard.layouts.app')

@section('page_title','Stores')

@section('page_action')
    <a href="{{ route('stores.index') }}" class="btn btn-info">All</a>
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Store - {{ $store->name }}</h3>
                </div>
                <form action="{{ route('stores.update', $store) }}" method="POST" enctype="multipart/form-data">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="main_image" class="form-label">Main Image</label>
                                    <input type="file" id="main_image" name="main_image" class="form-control {{ $errors->has('main_image') ? ' is-invalid' : '' }}" value="{{ old('main_image') }}">
                                    @if ($errors->has('main_image'))
                                        <div class="invalid-feedback">{{ $errors->first('main_image') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="banner_image" class="form-label">Banner Image</label>
                                    <input type="file" id="banner_image" name="banner_image" class="form-control {{ $errors->has('banner_image') ? ' is-invalid' : '' }}" value="{{ old('banner_image') }}">
                                    @if ($errors->has('banner_image'))
                                        <div class="invalid-feedback">{{ $errors->first('banner_image') }}</div>
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
