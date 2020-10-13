@extends('layouts.admin')
@section('content')
<div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ __('Reservation') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Reservation') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="content">
            <table id="table" class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>{{ __('Resrvation Date') }}</th>
                        <th>{{ __('Reserved By') }}</th>
                        <th>{{ __('Phone') }}</th>
                        <th>{{ __('Type') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Control') }}</th>
                    </tr>
                </thead>
                
                <tbody>

                    @foreach ($reservation as $reserv)
                        <tr>
                            <td style="line-height: 67px;">{{ $reserv->date ." - ".$reserv->time }}</td>
                            <td style="line-height: 67px;">{{ $reserv->user->name }}</td>
                            <td style="line-height: 67px;">{{ $reserv->user->phone }}</td>
                            <td style="line-height: 67px;">{{ $reserv->type }}</td>
                            <td style="line-height: 67px;">{{ $reserv->status }}</td>
                            <td style="line-height: 67px;">
                                <a href="{{ route('admin.reservation.show', ['reservation'=> $reserv]) }}" class="btn btn-primary">{{ __('Show') }}</a>
                                <a href="{{ route('admin.reservation.edit', ['reservation'=> $reserv]) }}" class="btn btn-success">{{ __('Edit') }}</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
                
            </table> 
        </div>
        <script>
            $(function () {
                try {
                    $('#table').DataTable();
                } catch (error) {
                    
                }
            })
        </script>
    </div>
    
@endsection