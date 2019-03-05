@extends('dashboard.layouts.app')

@section('page_title','Product Groupings')

@section('page_action')
    <a href="{{ route('productGroupings.index') }}" class="btn btn-info">All</a>
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Product Grouping</h3>
                </div>
                <form action="{{ route('productGroupings.store') }}" method="POST">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="store_name" class="form-label">Grouping Name</label>
                                    <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Grouping Name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
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
