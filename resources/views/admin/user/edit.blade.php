@extends('layouts.admin')
@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ __('Users') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.users.index') }}">{{ __('Users') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 60px">

        <form action="{{ route('admin.users.edit', ['user'=>$user]) }}" method="POST">
            @csrf
            
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="name" class="control-label">{{ __('Name') }}</label>
                </div>
                <div class="col-md-8">
                    <input type="text" value="{{ $user->name }}" class="form-control" readonly id="name" placeholder="User Name">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="phone" class="control-label">{{ __('Phone') }}</label>
                </div>
                <div class="col-md-8">
                    <input type="text" value="{{ $user->phone }}" class="form-control" readonly id="address" placeholder="User Phone">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="email" class="control-label">{{ __('Email') }}</label>
                </div>
                <div class="col-md-8">
                    <input type="text" value="{{ $user->email }}" class="form-control" readonly id="email" placeholder="User Email">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="password" class="control-label">{{ __('Password') }}</label>
                </div>
                <div class="col-md-8">
                    <input type="password" class="form-control" value="{{ old('password') }}" name="password" id="password" required placeholder="Change User Password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="confirm" class="control-label">{{ __('Confirm Password') }}</label>
                </div>
                <div class="col-md-8">
                    <input type="password" class="form-control" name="password_confirmation" id="confirm" required placeholder="Confirm Password">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <button class="btn btn-purple btn-block"><i class="fa fa-send"></i> {{ __('Process') }}</button>
                </div>   
            </div>
                    
        </form>

    </div>

@endsection