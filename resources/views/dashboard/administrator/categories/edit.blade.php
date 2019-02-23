@extends('dashboard.layouts.app')

@section('page_title','Product Categories')

@section('page_action')
    <a href="{{ route('dashboard.admin.categories.index') }}" class="btn btn-info">All</a>
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Product Category - {{ $category->name }}</h3>
                </div>
                <form action="{{ route('dashboard.admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="store_name" class="form-label">Category Name</label>
                                    <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Category Name" value="{{ $category->name }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="parent_category" class="form-label">Parent Category</label>
                                    <select name="parent_category" id="parent_category"  class="form-control {{ $errors->has('parent_category') ? ' is-invalid' : '' }}">
                                        <option value="0">Parent Category</option>
                                        @foreach($categories as $cat)
                                            @if($cat->id == $category->id)
                                                @break
                                            @endif
                                            <option value="{{ $cat->id }}" @if($category->isChildOf($cat)) selected @endif>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('parent_category'))
                                        <div class="invalid-feedback">{{ $errors->first('parent_category') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="main_image" class="form-label">Main Image</label>
                                    <input type="file" id="main_image" name="main_image" class="form-control {{ $errors->has('main_image') ? ' is-invalid' : '' }}" value="{{ old('main_image') }}" required>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $category->description }}</textarea>
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