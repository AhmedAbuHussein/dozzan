@extends('layouts.admin')
@section('content')
<style>
    .box{
        width: 100%;
        margin-bottom: 15px;
        min-height: 215px;
        background: #ccc;
        border-radius: 10px;
        padding: 20px;
        position: relative;
    }
    .box i{
        font-size: 95px;
    }
    .box span{
        position: absolute;
        top: 10px;
        right: 30px;
        font-size: 50pt;
    }
    .box a{
        position: absolute;
        bottom: 0;
        left:0;
        right: 0;
        width:100%;
        padding:10px;
        background: #ddd;
        text-align: center;
        font-size: 20px;
        transition: all 0.5s linear;
        color: #000;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
    }
    .box a:hover{
        background: #aaa;
        color: white;
    }
    .sidebar-nav ul .sidebar-item{
        width: auto;
    }
</style>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">{{ __('Dashboard') }}</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

    <div class="container-fluid">
       
       <div class="row">
           <div class="col-md-3">
               <div class="box">
                   <i class="fa fa-users"></i>
                   <span>{{ $users }}</span>
                   <a href="{{ route('admin.users.index') }}">{{ __('Users') }}</a>
               </div>
           </div>
           <div class="col-md-3">
               <div class="box">
                   <i class="fa fa-product-hunt"></i>
                   <span>{{ $products }}</span>
                   <a href="{{ route('admin.products.index') }}">{{ __('Products') }}</a>
               </div>
           </div>

           <div class="col-md-3">
                <div class="box">
                    <i class="fa fa-list"></i>
                    <span>{{ $categories }}</span>
                    <a href="{{ route('admin.categories.index') }}">{{ __('Categories') }}</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box">
                    <i class="fa fa-universal-access"></i>
                    <span>{{ $orders }}</span>
                    <a href="{{ route('admin.orders.index') }}">{{ __('Orders') }}</a>
                </div>
            </div>

       </div>

    </div>
@endsection


