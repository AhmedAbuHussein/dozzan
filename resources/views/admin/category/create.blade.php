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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Create') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4">

        <form class="mt-4" action="{{ route('admin.categories.create') }}" method="POST">
            @csrf
        
            <div class="row">
                <div class="form-group col-md-6 offset-md-3">
                    <label for="icon">{{ __('Icon') }}</label>
                    <div class="d-flex justify-content-center">
                        <p id="icon-p" class="text-center">{!! old('icon') !!}</p>
                    </div>
                   <input type="text" name="icon" value="{{ old('icon') }}" id="icon"  required/>
                   @error('icon')
                       <div class="text-danger">{{ $message }}</div>
                   @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 offset-md-3">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Category Name" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 offset-md-3">
                    <label for="details">{{ __('Details') }}</label>
                    <textarea name="details" id="details" class="form-control" placeholder="Category Details" required>{{ old('details') }}</textarea>
                    @error('details')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 offset-md-3">
                    <label for="sort">{{ __('Sort') }}</label>
                    <input type="number" name="sort" id="sort" value="{{ old('sort') }}" class="form-control" placeholder="Category Sort" required>
                    @error('sort')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 offset-md-3">
                    <button class="btn btn-purple btn-block"><i class="fa fa-send"></i> {{ __('Process') }}</button>
                </div>
            </div>

        </form>

        <!-- Modal -->
        <div class="modal fade" id="icon-modal" role="dialog">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @for ($i = 0; $i <= 95; $i++)
                    <i class="icon flaticon-{{ $i }}" data-icon="<i class='flaticon-{{ $i }}'></i>"></i>
                    @endfor
                </div>
            </div>
            </div>
        </div>

    </div>
@endsection

@section('style')
    <style>
        #icon-p{
            width: 95px;
            height: 95px;
            background: #fff;
            margin: 0;
            cursor: pointer;
        }
        #icon{
            width: 0;
            height: 0;
            visibility: hidden;
        }
    </style>
@endsection 

@section('script')
    <script>
        $(function() {
            $('#icon-p').click(()=>{
                $('#icon-modal').modal('show');
            });

            $('i.icon').click(function(){
                let icon = $(this).data('icon');
                $('#icon').val(`${icon}`);
                $('#icon-p').html(icon);
                $('#icon-modal').modal('hide');
            });

        });
    </script>
@endsection