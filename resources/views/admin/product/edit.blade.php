@extends('layouts.admin')
@section('content')
<style>
    #label-img {
        padding: 20px;
        border: 1px solid #ddd;
        display: inline-block;
        width: 100%;
        text-align: center;
    }
    #label-img img{
        max-width: 100%;
    }
        #label-img+input[type='file']{
        width: 0;
        height: 0;
        border: none;
        opacity: 0;
    }

</style>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">{{ __('Product') }}</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.products.index') }}">{{ __('Products') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Edit') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid">

        <form action="{{ route('admin.products.edit', ['product'=> $product->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="form-group col-md-6 offset-md-3">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" name="name" id="name" value="{{ old('name')??$product->name }}" class="form-control" placeholder="Item Name" required>
                    @error('name')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>

                <div class="form-group col-md-6 offset-md-3">
                    <label for="price">{{ __('Price') }}</label>
                    <input type="number" min="1" name="price" id="price" value="{{ old('price')??$product->price }}" class="form-control" placeholder="Item price" required>
                    @error('price')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>

                <div class="form-group col-md-6 offset-md-3">
                    <label for="details">{{ __('Details') }}</label>
                    <textarea rows="3" name="details" id="details" class="form-control" placeholder="Item details" required>{{ old('details')??$product->details }}</textarea>
                    @error('details')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                </div>

                <div class="form-group col-md-6 offset-md-3">
                    <label for="category_id">{{ __('Category') }}</label>
                    <select class="form-control" name="category_id" required>
                        <option value="">-- Choose --</option>
                        @foreach ($categories as $category)
                        <option {{ ($product->category_id == $category->id || old('category_id') == $category->id)? 'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>

                    <div class="form-group col-md-6 offset-md-3 mb-3">
                        <label for="img" id="label-img">
                            <img style="cursor: pointer;" class="preview" src="{{ url($product->image) }}" title="Choose image" />
                        </label>
            
                        <input type="file" class="form-control-file" name="image" id="img" accept="image/*" >
                        @error('image')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>

                <div class="form-group col-md-6 offset-md-3 mb-4 mt-4">
                    <button type="submit" class="btn btn-purple btn-block"><i class="fa fa-send"></i> {{ __('Process') }}</button>
                </div>

            </div>


        </form>

    </div>
@endsection