@extends('layouts.admin')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ __('Category') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.categories.index') }}">{{ __('Category') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Show') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row" style="margin-top:60px">
            <div class="col-md-12 mx-auto">

                <div class="row" style="border-bottom: 1px solid rgb(207, 209, 208);">
                    <div class="col-md-4">
                        <h4 class="text-muted">{{ __('Name') }}</h4>
                    </div>
                    <div class="col-md-8"><p>{{ $category->name }}</p></div>
                </div>

                <div class="row bg-white" style="border-bottom: 1px solid rgb(207, 209, 208);">
                    <div class="col-md-4 d-flex align-items-center" style="border-right: 1px solid rgb(207, 209, 208);">
                        <h4 class="text-muted px-2">{{ __('Details') }}</h4>
                    </div>
                    <div class="col-md-8"><p class="py-3 mb-0">{{ $category->details }}</p></div>
                </div>

                <div class="row">
                    <div class="col-md-4 d-flex align-items-center">
                        <h4 class="text-muted">{{ __('Icon') }}</h4>
                    </div>
                    <div class="col-md-8"><p>{!! $category->icon !!}</p></div>
                </div>

            </div>
        </div>
        <hr class="my-4"/>
        <h3 class="mb-4 text-muted text-center">{{ __('Category Products') }}</h3>
        <hr class="my-4"/>
        <div class="content mt-4">
            <table id="table" class="table table-striped table-hover text-center mt-4">
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

                    @foreach ($category->products as $product)
                        <tr>
                            <td style="line-height: 67px;">{{ $product->name }}</td>
                            <td style="line-height: 67px;"><img style="height:65px;" src="{{ url($product->image) }}" title="{{ $product->name }}" ></td>
                            <td style="line-height: 67px;">{{ $product->category->name }}</td>
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

