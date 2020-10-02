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
                <h4 class="page-title">{{ trans('app.category') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('/categories') }}">Category</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('app.edit') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <form action="{{ url('category/update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $category->id }}" />
            <div class="row">
                <div class="form-group col-md-6 offset-md-3">
                    <label for="img" id="label-img">
                        <img style="cursor: pointer;" class="preview" src="{{ url('uploads/categories/'.$category->photo) }}" title="Choose image" />
                    </label>
        
                    <input type="file" class="form-control-file" name="img" id="img" accept="image/*" >
                    @if ($errors->has('img'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('img') }}</strong>
                    </span>
                     @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 offset-md-3">
                    <label for="name">{{ trans('app.name') }}</label>
                    <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control" placeholder="Category Name" required>
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                     @endif
                </div>
                <div class="form-group col-md-6 offset-md-3">
                    <label for="visible">{{ trans('app.visible') }}</label>
                    <select class="form-control" name="visible" required>
                        <option {{ $category->visible == 1 ? 'selected': '' }} value="1">{{ trans('app.visible') }}</option>
                        <option {{ $category->visible == 0 ? 'selected': '' }} value="0">{{ trans('app.hidden') }}</option>
                    </select>
                    @if ($errors->has('visible'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('visible') }}</strong>
                    </span>
                     @endif
                </div>
                <div class="form-group col-md-6 offset-md-3">
                    <button class="btn btn-purple btn-block"><i class="fa fa-send"></i> Send</button>
                </div>

            </div>


        </form>

    </div>
@endsection