@extends('dashboard.layouts.app')

@section('page_title','Store Branches')

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Store Branch</h3>
                </div>
                <form action="{{ route('dashboard.admin.branches.store', $store) }}" method="POST">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="branch_name" class="form-label">Branch Name</label>
                                    <input type="text" id="branch_name" name="branch_name" class="form-control {{ $errors->has('branch_name') ? ' is-invalid' : '' }}" placeholder="Branch Name" value="{{ old('branch_name') }}" required autofocus>
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