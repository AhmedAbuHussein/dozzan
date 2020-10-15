@extends('layouts.admin')
@section('content')
<div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ __('Categories') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Categories') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-purple btn-block"><i class="fa fa-product-hunt"></i> {{ __('New Item') }}</a>
            </div>
        </div>
        <div class="content">
            <table id="table" class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>{{ __('Sort') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Icon') }}</th>
                        <th>{{ __('Details') }}</th>
                        <th>{{ __('Control') }}</th>
                    </tr>
                </thead>
                
                <tbody>

               @foreach ($categories as $category)
                   <tr>
                       <td style="line-height: 72px;">{{ $category->sort }}</td>
                       <td style="line-height: 72px;">{{ $category->name_lang }}</td>
                       <td>{!! $category->icon !!}</td>
                       <td style="width: 45%"><p class="truncate-1-line">{{ $category->details_lang  }}</p></td>
                       <td style="line-height: 72px;">
                        <a href="{{ route('admin.categories.show', ['category'=> $category]) }}" class="btn btn-primary">{{ __('Show') }}</a>
                           <a href="{{ route('admin.categories.edit', ['category'=> $category]) }}" class="btn btn-success">{{ __('Edit') }}</a>
                           <a href="{{ route('admin.categories.destroy', ['category'=> $category]) }}" class="btn btn-danger">{{ __('Delete') }}</a>
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