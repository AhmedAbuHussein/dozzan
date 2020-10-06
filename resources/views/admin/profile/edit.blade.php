@extends('layouts.admin')
@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ __('Admin') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Profile') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 60px">
       <div class="row">
           <div class="col-md-10 mr-auto ml-auto">
                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="name" class="control-label">{{ __('Name') }}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" value="{{ old('name')??$admin->name }}" name="name" class="form-control" required id="name" placeholder="Admin Name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="email" class="control-label">{{ __('Email') }}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="email" value="{{ old('email')??$admin->email }}" name="email" class="form-control" required id="email" placeholder="User Email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="oldpassword" class="control-label">{{ __('Old Password') }}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" class="form-control" value="{{ old('oldpassword') }}" name="oldpassword" id="oldpassword" required placeholder="Current Password">
                            @error('oldpassword')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="password" class="control-label">{{ __('New Password') }}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" class="form-control" value="{{ old('password') }}" name="password" id="password" required placeholder="Change Password">
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
       </div>
    </div>

@endsection
