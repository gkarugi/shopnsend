@extends('dashboard.layouts.app')

@section('page_title','Store Branches')

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Store Branch - {{ $branch->name }}</h3>
                </div>
                <form action="{{ route('dashboard.admin.branches.update', ['store' => $store, 'branch' => $branch]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="store_name" class="form-label">Branch Name</label>
                                    <input type="text" id="branch_name" name="branch_name" class="form-control {{ $errors->has('branch_name') ? ' is-invalid' : '' }}" placeholder="Branch Name" value="{{ $branch->name }}" required autofocus>
                                    @if ($errors->has('branch_name'))
                                        <div class="invalid-feedback">{{ $errors->first('branch_name') }}</div>
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