@extends('layouts.admin')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">{{ __('Setting') }}</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Setting') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>{{ __('Key') }}</th>
                    <th>{{ __('Value') }}</th>
                    <th>{{ __('Control') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($setting as $item)
                    
                    <tr>
                        <td>{{ $item->key }}</td>
                        <td>
                            @if ($item->key == 'logo'  || 
                                 $item->key == 'logo2' || 
                                 $item->key == 'logo3' || 
                                 $item->key == 'logo4' || 
                                 $item->key == 'about_image_two' ||
                                 $item->key == 'about_imag' || 
                                 $item->key == 'about_image')
                                <img src="{{ url($item->value) }}" alt="{{ $item->key }}" width="150px" />
                                @php  $type = "image";  @endphp
                            @elseif($item->key == 'social_links')
                            <ul>
                                @foreach (json_decode($item->value) as $val)
                                <li>{{ $val }}</li>
                                @endforeach
                            </ul>
                            @php  $type = "social";  @endphp
                            @elseif( $item->key == 'banner_words')
                                <ul>
                                    @foreach (explode(':', $item->value) as $word)
                                        <li>{{ $word }}</li>
                                    @endforeach
                                </ul>
                                @php  $type = "words";  @endphp
                            @else
                                <p>{{ $item->value }}</p>
                                @php  $type = "text";  @endphp
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.setting.edit', ['setting'=>$item->id, 'type'=>$type]) }}"> {{ __('Edit') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection