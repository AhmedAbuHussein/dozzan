@extends('layouts.admin')
@section('content')
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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Product') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4 offset-md-4">
                <a href="{{ route('admin.products.create') }}" class="btn btn-purple btn-block"><i class="fa fa-product-hunt"></i> {{ __('New Item') }}</a>
            </div>
        </div>

        <div class="content">
            <table id="table" class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Image') }}</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Price') }}</th>
                        <th>{{ __('Control') }}</th>
                    </tr>
                </thead>
                
                <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <td style="line-height: 67px;">{{ $product->name_lang }}</td>
                            <td style="line-height: 67px;"><img style="height:65px;" src="{{ url($product->image) }}" title="{{ $product->name_lang }}" ></td>
                            <td style="line-height: 67px;">{{ $product->category->name_lang }}</td>
                            <td style="line-height: 67px;">{{ $product->price }}</td>
                            <td style="line-height: 67px;">
                                <a href="{{ route('admin.products.show', ['product'=> $product]) }}" class="btn btn-primary">{{ __('Show') }}</a>
                                <a href="{{ route('admin.products.edit', ['product'=> $product]) }}" class="btn btn-success">{{ __('Edit') }}</a>
                                <a href="{{ route('admin.products.destroy', ['product'=> $product]) }}" class="btn btn-danger">{{ __('Delete') }}</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
                
            </table> 
        </div>
        <script>
            $(function () {
                $('#table').DataTable();
            })
        </script>
    </div>
    
@endsection