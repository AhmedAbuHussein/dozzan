@extends('layouts.admin')
@section('content')
<style>
    .image img{
        width: 200px;
        height: 200px;
        border-radius: 100%;
        border: 1px solid #d5d5d5;
        padding: 3px;

    }
</style>
<div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ trans('app.users') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('/users') }}">Users</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('app.edit') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <form action="{{ url('user/update') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}" />
            
            <div class="container">
                <div class="text-center image my-3">
                    @if (strlen($user->img) > 0)
                    <img src="{{ url('uploads/users/'.$user->img) }}" />
                    @else
                    <img src="{{ url('uploads/users/unknown.png') }}" />
                    @endif
                </div>
                <form>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="name" class="control-label">{{ trans('app.name') }}</label>
                            <input type="text" value="{{ $user->name }}" class="form-control" readonly id="name" placeholder="User Name">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="control-label">{{ trans('app.phone') }}</label>
                            <input type="text" value="{{ $user->phone }}" class="form-control" readonly id="address" placeholder="User Phone">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="email" class="control-label">{{ trans('app.email') }}</label>
                            <input type="text" value="{{ $user->email }}" class="form-control" readonly id="email" placeholder="User Email">
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="control-label">{{ trans('app.status') }}</label>
                            <select name="status" required class="form-control">
                                <option {{ $user->status == "active"?'selected':'' }} value="active">Active</option>
                                <option {{ $user->status == "inactive"?'selected':'' }} value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-purple btn-block"><i class="fa fa-send"></i> Update</button>
                    </div>
                    
                </form>
            </div>


        </form>

    </div>

@endsection