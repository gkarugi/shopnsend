@extends('dashboard.layouts.app')

@section('page_title','Product')

@section('page_action')
    <a href="{{ route('products.index') }}" class="btn btn-info">All Products</a>
@stop

@section('page')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Product - {{ $product->name }}</h3>
                </div>
                <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="store_name" class="form-label">Product Name</label>
                                    <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Category Name" value="{{ $product->name }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" id="price" name="price" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="Price" value="{{ $product->price }}" required>
                                    @if ($errors->has('price'))
                                        <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category" id="category"  class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}">
                                        <option value="" @if(!$product->category) selected @endif>Choose Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" @if($product->category) @if($product->category->id == $cat->id) selected @endif @endif>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <div class="invalid-feedback">{{ $errors->first('category') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="grouping" class="form-label">Grouping</label>
                                    <select name="grouping" id="grouping"  class="form-control {{ $errors->has('grouping') ? ' is-invalid' : '' }}" required>
                                        <option value="" @if(!$product->grouping) selected @endif>Choose Grouping</option>
                                        @foreach($groupings as $grouping)
                                            <option value="{{ $grouping->id }}" @if($product->grouping) @if($product->grouping->id == $grouping->id) selected @endif @endif>{{ $grouping->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('grouping'))
                                        <div class="invalid-feedback">{{ $errors->first('grouping') }}</div>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $product->description }}</textarea>
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
