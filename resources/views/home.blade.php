@extends('layouts.app')
@section('style')
<style>
    .banner-text #header p{
        font: inherit;
        color: inherit;
        display: inline-block;
        padding: 0;
    }
    p.title-caption p{
        font: inherit;
        color: inherit;
        display: inline-block;
        padding: 0;
    }
    .title-custom>p{
        letter-spacing: 0.16px;
        padding: 20px 120px;
        color: #666;
        font-size: 18px;
        text-align: center;
    }
    .title-custom.p-white>p{
        color: #fff;
    }
    .gal-item .box{
        height: 245px;
    }
    .gal-container .modal-dialog{
        width: 30%;
    }
    body:not(.modal-open){
        padding-right: 0 !important;
    }
    .gal-container .description{
        height: 95px;
        top: -95px;
        overflow: hidden;
    }
    </style>
@endsection
@section('content')

<div id="banner" class="banner full-screen-mode parallax">
    <div class="container pr">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="banner-static">
                <div class="banner-text">
                    <div class="banner-cell">
                        <h1 id="header">{!! optional($setting->where('key', 'banner_header')->first())->value_lang !!}  <span class="typer" id="some-id" data-delay="200" data-delim=":" data-words="{{ optional($setting->where('key', 'banner_words')->first())->value_lang }}" data-colors="red"></span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1>
                        {!! optional($setting->where('key', 'banner_header_two')->first())->value_lang !!}
                        {!! optional($setting->where('key', 'banner_desc')->first())->value_lang !!}
                        <div class="book-btn">
                            <a href="#reservation" class="table-btn hvr-underline-from-center">{{ __('file.BOOK MY TABLE') }}</a>
                        </div>
                        <a href="#about">
                            <div class="mouse"></div>
                        </a>
                    </div>
                    <!-- end banner-cell -->
                </div>
                <!-- end banner-text -->
            </div>
            <!-- end banner-static -->
        </div>
        <!-- end col -->
    </div>
    <!-- end container -->
</div>
<!-- end banner -->

<div id="about" class="about-main pad-top-100 pad-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title"> {{ __('file.About Us') }} </h2>
                    <h3>{!! optional($setting->where('key', 'about_header')->first())->value_lang !!}</h3>
                    <p>{!! optional($setting->where('key', 'about_desc')->first())->value_lang !!}</p>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <div class="about-images">
                        <img class="about-main" src="{{ optional($setting->where('key', 'about_image')->first())->value_lang }}" alt="About Main Image">
                        <img class="about-inset" src="{{ optional($setting->where('key', 'about_image_two')->first())->value_lang }}" alt="About Inset Image">
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>

<div class="special-menu pad-top-100 parallax">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title color-white text-center"> {{ __("file.Today's Special") }} </h2>
                    @php
                        $special = $categories->first();
                    @endphp
                    <h5 class="title-caption text-center"> {!! optional($special)->details_lang !!} </h5>
                </div>
                <div class="special-box">
                    <div id="owl-demo">
                        @foreach ($special->products as $item)
                        <div class="item item-type-zoom">
                            <a href="#" class="item-hover">
                                <div class="item-info">
                                    <div class="headline">
                                       {{ $item->name_lang }}
                                        <div class="line"></div>
                                        <div class="dit-line">{!! $item->details_lang !!}</div>
                                    </div>
                                </div>
                            </a>
                            <div class="item-img">
                                <img src="{{ $item->image }}" alt="sp-menu">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- end special-box -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end special-menu -->

<div id="menu" class="menu-main pad-top-100 pad-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wow fadeIn title-custom" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title text-center">
                        {{ __('file.Our Menu') }}
                    </h2>
                    {!! optional($setting->where('key','menu_desc')->first())->value_lang !!}
                </div>
                <div class="tab-menu">
                    <div class="slider slider-nav">
                        @php
                            $cats = $categories->where('name', '<>', 'special')->random(4);
                        @endphp
                        @foreach ($cats as $category)
                        <div class="tab-title-menu">
                            <h2 style="text-transform: uppercase">{{ $category->name_lang }}</h2>
                            <p> {!! $category->icon !!} </p>
                        </div>
                        @endforeach
                    </div>
                    <div class="slider slider-single">
                        @foreach ($cats as $category)
                        <div>
                            @foreach ($category->products->take(4) as $product)
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                <div class="offer-item">
                                    <img src="{{ $product->image }}" alt="" class="img-responsive">
                                    <div style="overflow: hidden">
                                        <h3 style="text-transform: uppercase">{{ $product->name_lang }}</h3>
                                            <p class="line-2">{!! $product->details_lang !!}</p>
                                    </div>
                                    <span class="offer-price">{{ $product->price }}</span>
                                </div>
                            </div>
                            <!-- end col -->
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- end tab-menu -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end menu -->

<div id="our_team" class="team-main pad-top-100 pad-bottom-100 parallax">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wow fadeIn title-custom p-white" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title text-center">
                   {{ __('file.Our Team') }}
                </h2>
                    {!! optional($setting->where('key', 'team_desc')->first())->value_lang !!}
                </div>
                <div class="team-box">

                    <div class="row">
                        @foreach ($team as $item)
                        <div class="col-md-4 col-sm-6">
                            <div class="sf-team">
                                <div class="thumb">
                                    <a href="#"><img src="{{ $item->image }}" alt=""></a>
                                </div>
                                <div class="text-col">
                                    <h3 style="text-transform: capitalize">{{ $item->name_lang }}</h3>
                                    <p>{{ $item->details_lang }}</p>
                                    <ul class="team-social">
                                        <li><a href="{{ $item->facebook??'/' }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="{{ $item->twitter??'/' }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="{{ $item->linkedin??'/' }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        @endforeach

                    </div>
                    <!-- end row -->

                </div>
                <!-- end team-box -->

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end team-main -->

<div id="gallery" class="gallery-main pad-top-100 pad-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title text-center">
                    {{ __('file.Our Products') }}
                </h2>
                    <div class="title-custom">{!! optional($setting->where('key', 'gallery_desc')->first())->value_lang !!}</div>
                </div>
                <div class="gal-container clearfix">
                    @foreach ($products->random(8) as $key=>$product)
                    <div class="col-md-3 col-sm-6 co-xs-12 gal-item">
                        <div class="box">
                            <a href="#" data-toggle="modal" data-target="#product-{{ ($key+1) }}">
                                <img src="{{ $product->image }}" alt="" />
                            </a>
                            <div class="modal fade" id="product-{{ ($key+1) }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <div class="modal-body">
                                            <img src="{{ $product->image }}" alt="" />
                                        </div>
                                        <div class="col-md-12 description">
                                            <h4>{{ $product->details_lang }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- end gal-container -->

                <div class="blog-btn-v">
                    <a class="hvr-underline-from-center white-bg" href="{{ route('products') }}">{{ __('file.Show All') }}</a>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end gallery-main -->

<div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="block-title text-center">
                {{ __('file.Our Parties') }}
            </h2>
                <div class="blog-box clearfix">
                    @foreach ($parties as $party)
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-block">
                                    <div class="blog-img-box">
                                        <img src="{{ $party->image }}" style="width: 270px; height: 270px;" alt="" />
                                        <div class="overlay">
                                            <a href="{{ $party->link ?? '/' }}"><i class="fa fa-link" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="blog-dit">
                                        <p><span style="text-transform: uppercase">{{ $party->created_at->diffForHumans() }}</span></p>
                                        <h2 style="text-transform: uppercase">{{ $party->event }}</h2>
                                        <h5 style="text-transform: capitalize">BY {{ $party->owner }}</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                    @endforeach
                </div>
                <!-- end blog-box -->

                <div class="blog-btn-v">
                    <a class="hvr-underline-from-center" href="{{ route('party') }}">{{ __('file.Show All') }}</a>
                </div>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end blog-main -->


<div id="reservation" class="reservations-main pad-top-100 pad-bottom-100">
    <div class="container">
        <div class="row">
            <div class="form-reservations-box">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title text-center">{{ __('file.Reservations') }}</h2>
                    </div>
                    <h4 class="form-title">{{ __('file.BOOKING TABLES') }}</h4>
                    <p>{{ __('file.YOU CAN RESERVE A TABLES OR ROOM') }} @guest <a href="{{ route('login') }}">{{ __('file.JUST LOGIN') }}</a> @endguest</p>
                    @auth
                    <form action="{{ route('reservation') }}" method="POST" class="reservations-box">
                        @csrf
                        <div class="row">
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ __('file.Name') }}</label>
                                    <input type="text" value="{{ old('name') }}" name="name" placeholder="{{ __('file.Your Name') }}" class="form-control" required autofocus />
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                           </div>

                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">{{ __('file.Phone') }}</label>
                                    <input type="text" value="{{ old('phone') }}" name="phone" placeholder="{{ __('file.Your phone') }}" class="form-control" required />
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="date-picker">{{ __('file.Reservation Date') }}</label>
                                     <input type="text" value="{{ old('date') }}" name="date" id="date-picker" placeholder="{{ __('file.Reservation Date') }}" class="form-control" required />
                                     @error('date')
                                         <div class="text-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                            </div>
 
                            <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="time-picker">{{ __('file.Reservation Time') }}</label>
                                     <input type="text" value="{{ old('time') }}" id="time-picker" name="time" placeholder="{{ __('file.Reservation Time') }}" class="form-control" required />
                                     @error('time')
                                         <div class="text-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                             </div>
                         </div>

                         <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="person">{{ __('file.Persons No.') }}</label>
                                     <input type="number" value="{{ old('persons') }}" name="persons" id="person" placeholder="{{ __('file.Persons No.') }}" class="form-control" required />
                                     @error('persons')
                                         <div class="text-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                            </div>
 
                            <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="selectpicker">{{ __('file.Reservation Type') }}</label>
                                     <select name="type" id="selectpicker" required class="selectpicker form-control">
                                         <option value="">{{ __('file.Select') }}</option>
                                        <option value="table">{{ _('Table') }}</option>
                                        <option value="room">{{ _('Room') }}</option>
                                    </select>
                                     @error('type')
                                         <div class="text-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                             </div>
                         </div>


                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="reserve-book-btn text-center">
                                <button class="hvr-underline-from-center" type="submit" value="SEND" id="submit">{{ __('file.BOOK MY TABLE') }} </button>
                            </div>
                        </div>
                    </form>

                    @endauth
                </div>
                <!-- end col -->
            </div>
            <!-- end reservations-box -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end reservations-main -->


@endsection
