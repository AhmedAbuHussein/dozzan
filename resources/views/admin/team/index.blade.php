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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Team') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <a href="{{ route('admin.team.create') }}" class="btn btn-purple btn-block"><i class="fa fa-plus"></i> {{ __('New Employee') }}</a>
            </div>
        </div>
        <div class="content">
            <table id="table" class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Image') }}</th>
                        <th>{{ __('Details') }}</th>
                        <th>{{ __('Control') }}</th>
                    </tr>
                </thead>
                
                <tbody>

                    @foreach ($team as $user)
                    <tr class="text-center">
                        <td>{{ $user->name_lang }}</td>
                        <td><img src="{{ url($user->image) }}" style="width: 120px;"/></td>
                        <td>{{ $user->details_lang }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.team.show', ['employee'=> $user->id]) }}"><i class="fa fa-eye"></i> {{ __('Show') }}</a> 
                            <a class="btn btn-success" href="{{ route('admin.team.edit', ['employee'=> $user->id]) }}"><i class="fa fa-edit"></i> {{ __('Edit') }}</a>
                            <a class="btn btn-danger" href="{{ route('admin.team.delete', ['employee'=> $user->id]) }}"><i class="fa fa-close"></i> {{ __('Del') }}</a> 
 
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