@extends('layouts.admin')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ __('Order') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.orders.index') }}">{{ __('Order') }}</a>
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
                    <div class="col-md-4">{{ __('User') }}</div>
                    <div class="col-md-8">{{ $order->user->name }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('Phone') }}</div>
                    <div class="col-md-8">{{ $order->user->phone }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('Shipping') }}</div>
                    <div class="col-md-8">{{ $order->shipping }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('Price') }}</div>
                    <div class="col-md-8">{{ $order->price }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('Status') }}</div>
                    <div class="col-md-8">{{ $order->status }}</div>
                </div>
                
                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('Last Update') }}</div>
                    <div class="col-md-8">{{ $order->updated_at->diffForHumans() }}</div>
                </div>

                <div class="row py-3">
                    <div class="col-md-4">{{ __('Product') }}</div>
                    <div class="col-md-8">
                        <ul class="list-unstyled">
                            @foreach ($order->items as $id)
                            <?php $item = Facades\App\Repository\Product::all('created_at')->where('id', $id)->first(); ?>
                                <li class="list-group-item d-flex justify-content-start">
                                    <div class="image">
                                        <img src="{{ url($item->image) }}" style="width: 65px; height:65px; border-radius: 100%; padding: 5px; background: #fff" />
                                    </div>
                                    <div class="name">
                                        <p style="line-height: 65px; min-width: 260px; text-align:center">{{ $item->name }}</p>
                                    </div>
                                    <div class="name">
                                        <p style="line-height: 65px;">{{ $item->price . ' $' }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection