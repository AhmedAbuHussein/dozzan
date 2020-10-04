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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Parties') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4 offset-md-4">
                <a href="{{ route('admin.parties.create') }}" class="btn btn-purple btn-block"><i class="fa fa-plus"></i> {{ __('New Party') }}</a>
            </div>
        </div>

        <div class="content">
            <table id="table" class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>{{ __('Owner') }}</th>
                        <th>{{ __('Image') }}</th>
                        <th>{{ __('event') }}</th>
                        <th>{{ __('URL') }}</th>
                        <th>{{ __('Control') }}</th>
                    </tr>
                </thead>
                
                <tbody>

                    @foreach ($parties as $party)
                        <tr>
                            <td style="line-height: 67px;">{{ $party->owner }}</td>
                            <td style="line-height: 67px;"><img style="height:65px;" src="{{ url($party->image) }}" title="{{ $party->owner }}" ></td>
                            <td style="line-height: 67px;">{{ $party->event }}</td>
                            <td style="line-height: 67px;">{{ $party->link }}</td>
                            <td style="line-height: 67px;">
                                <a href="{{ route('admin.parties.show', ['party'=> $party]) }}" class="btn btn-primary">{{ __('Show') }}</a>
                                <a href="{{ route('admin.parties.edit', ['party'=> $party]) }}" class="btn btn-success">{{ __('Edit') }}</a>
                                <a href="{{ route('admin.parties.destroy', ['party'=> $party]) }}" class="btn btn-danger">{{ __('Delete') }}</a>
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