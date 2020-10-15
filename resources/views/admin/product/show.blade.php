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
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.products.index') }}">{{ __('Product') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Show') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-body">
                
                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('Name') }}</div>
                    <div class="col-md-8">{{ $product->name_lang }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('Details') }}</div>
                    <div class="col-md-8">{{ $product->details_lang }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('Price') }}</div>
                    <div class="col-md-8">{{ $product->price }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('Category') }}</div>
                    <div class="col-md-8">{{ $product->category->name_lang }}</div>
                </div>
                
                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('Last Update') }}</div>
                    <div class="col-md-8">{{ $product->updated_at->diffForHumans() }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('Image') }}</div>
                    <div class="col-md-8">
                        <img src="{{ url($product->image) }}" style="max-width: 550px" alt="Image" />
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection