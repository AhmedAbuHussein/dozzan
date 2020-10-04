@extends('layouts.admin')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ __('Parties') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.parties.index') }}">{{ __('Parties') }}</a>
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
                    <div class="col-md-4">{{ __('Owner') }}</div>
                    <div class="col-md-8">{{ $party->owner }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('Prty Event') }}</div>
                    <div class="col-md-8">{{ $party->event }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('URL') }}</div>
                    <div class="col-md-8">{{ $party->link }}</div>
                </div>
                
                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('Last Update') }}</div>
                    <div class="col-md-8">{{ $party->updated_at->diffForHumans() }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('Image') }}</div>
                    <div class="col-md-8">
                        <img src="{{ url($party->image) }}" style="max-width: 550px" alt="Image" />
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection