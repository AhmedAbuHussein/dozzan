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
                <h4 class="page-title">{{ __('Employee') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.team.index') }}">{{ __('Employee') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 60px">

        <form action="{{ route('admin.team.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="nameen" class="control-label">{{ __('Name In English') }}</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="name[en]" value="{{ old('name.en') }}" class="form-control" required  id="nameen" placeholder="employee Name In English">
                    @error('name.en')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="namear" class="control-label">{{ __('Name In Arabic') }}</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="name[ar]" value="{{ old('name.ar') }}" class="form-control" required  id="namear" placeholder="employee Name In Arabic">
                    @error('name.ar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label class="control-label">{{ __('About Employee In English') }}</label>
                </div>
                <div class="col-md-8">
                    <textarea name="details[en]" required placeholder="Details about Employee In English" class="form-control">{{ old('details.en') }}</textarea>
                    @error('details.en')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label class="control-label">{{ __('About Employee In Arabic') }}</label>
                </div>
                <div class="col-md-8">
                    <textarea name="details[ar]" required placeholder="Details about Employee In Arabic" class="form-control">{{ old('details.ar') }}</textarea>
                    @error('details.ar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label class="control-label">{{ __('Facebook Link') }}</label>
                </div>
                <div class="col-md-8">
                    <input type="url" name="facebook" value="{{ old('facebook') }}" class="form-control" required placeholder="Facebook Url">
                    @error('facebook')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label class="control-label">{{ __('Twitter Link') }}</label>
                </div>
                <div class="col-md-8">
                    <input type="url" name="twitter" value="{{ old('twitter') }}" class="form-control" required  placeholder="Twitter Url">
                    @error('twitter')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label class="control-label">{{ __('Linkedin Link') }}</label>
                </div>
                <div class="col-md-8">
                    <input type="url" name="linkedin" value="{{ old('linkedin') }}" class="form-control" required  placeholder="Linkedin Url">
                    @error('linkedin')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-8 offset-md-4 mb-3">
                <label for="img" id="label-img">
                    <img style="cursor: pointer;" class="preview" src="" title="Choose image" />
                </label>
    
                <input type="file" class="form-control-file" required name="image" id="img" accept="image/*" >
                @error('image')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
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