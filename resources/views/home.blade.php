@extends('layouts.app')
@section('content')

<div id="banner" class="banner full-screen-mode parallax">
    <div class="container pr">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="banner-static">
                <div class="banner-text">
                    <div class="banner-cell">
                        <h1>{{ optional($setting->where('key', 'banner_header')->first())->value }}  <span class="typer" id="some-id" data-delay="200" data-delim=":" data-words="{{ optional($setting->where('key', 'banner_words')->first())->value }}" data-colors="red"></span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1>
                        <h2>{{ optional($setting->where('key', 'banner_header_two')->first())->value }} </h2>
                        <p>{{ optional($setting->where('key', 'banner_desc')->first())->value }}</p>
                        <div class="book-btn">
                            <a href="#reservation" class="table-btn hvr-underline-from-center">Book my Table</a>
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
                    <h2 class="block-title"> About Us </h2>
                    <h3>{!! optional($setting->where('key', 'about_header')->first())->value !!}</h3>
                    <p>{!! optional($setting->where('key', 'about_desc')->first())->value !!}</p> 
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <div class="about-images">
                        <img class="about-main" src="{{ optional($setting->where('key', 'about_image')->first())->value }}" alt="About Main Image">
                        <img class="about-inset" src="{{ optional($setting->where('key', 'about_image_two')->first())->value }}" alt="About Inset Image">
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
                    <h2 class="block-title color-white text-center"> Today's Special </h2>
                    @php
                        $special = $categories->where('name', 'special')->first();
                    @endphp
                    <h5 class="title-caption text-center"> {!! optional($special)->details !!} </h5>
                </div>
                <div class="special-box">
                    <div id="owl-demo">
                        @foreach ($special->products as $item)
                        <div class="item item-type-zoom">
                            <a href="#" class="item-hover">
                                <div class="item-info">
                                    <div class="headline">
                                       {{ $item->name }}
                                        <div class="line"></div>
                                        <div class="dit-line">{!! $item->details !!}</div>
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
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title text-center">
                    Our Menu 	
                </h2>
                    <p class="title-caption text-center">{!! optional($setting->where('key','menu_desc')->first())->value !!}</p>
                </div>
                <div class="tab-menu">
                    <div class="slider slider-nav">
                        @php
                            $cats = $categories->where('name', '<>', 'special')->random(4);
                        @endphp
                        @foreach ($cats as $category)
                        <div class="tab-title-menu">
                            <h2 style="text-transform: uppercase">{{ $category->name }}</h2>
                            <p> {!! $category->icon !!} </p>
                        </div>
                        @endforeach
                    </div>
                    <div class="slider slider-single">
                        @foreach ($cats as $category)
                        <div>
                            @foreach ($category->products as $product)
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                <div class="offer-item">
                                    <img src="{{ $product->image }}" alt="" class="img-responsive">
                                    <div>
                                        <h3 style="text-transform: uppercase">{{ $product->name }}</h3>
                                        <p>{!! $product->details !!}</p>
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
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title text-center">
                    Our Team 	
                </h2>
                    <p class="title-caption text-center">{!! optional($setting->where('key', 'team_desc')->first())->value !!}</p>
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
                                    <h3 style="text-transform: capitalize">{{ $item->name }}}</h3>
                                    <p>{{ $item->details }}</p>
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
                    Our Gallery	
                </h2>
                    <p class="title-caption text-center">{!! optional($setting->where('key', 'gallery_desc')->first())->value !!}</p>
                </div>
                <div class="gal-container clearfix">
                    @foreach ($products as $key=>$product)
                    <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
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
                                            <h4>{{ $product->details }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                </div>
                <!-- end gal-container -->
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
                Our Parties	
            </h2>
                <div class="blog-box clearfix">
                    @foreach ($parties as $party)
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-block">
                                    <div class="blog-img-box">
                                        <img src="{{ $party->image }}" alt="" />
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
                    <a class="hvr-underline-from-center" href="{{ route('party') }}">All Parties</a>
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
                        <h2 class="block-title text-center">Reservations</h2>
                    </div>
                    @guest
                    <h4 class="form-title">BOOKING TABLE</h4>
                    <p>YOU CAN RESERVE A TABLE AFTER <a style="color: #5a3614;font-weight: bold;" href="{{ route('login') }}">LOGIN</a> </p>
                    @else

                    <h4 class="form-title">BOOKING FORM</h4>
                    <p>PLEASE FILL OUT ALL REQUIRED* FIELDS. THANKS!</p>

                    <form id="contact-form" method="post" class="reservations-box" name="contactform" action="mail.php">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-box">
                                <input type="text" name="form_name" id="form_name" placeholder="Name" required="required" data-error="Firstname is required.">
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-box">
                                <input type="email" name="email" id="email" placeholder="E-Mail ID" required="required" data-error="E-mail id is required.">
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-box">
                                <input type="text" name="phone" id="phone" placeholder="contact no.">
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-box">
                                <select name="no_of_persons" id="no_of_persons" class="selectpicker">
                                    <option selected disabled>No. Of persons</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-box">
                                <input type="text" name="date-picker" id="date-picker" placeholder="Date" required="required" data-error="Date is required." />
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-box">
                                <input type="text" name="time-picker" id="time-picker" placeholder="Time" required="required" data-error="Time is required." />
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-box">
                                <select name="preferred_food" id="preferred_food" class="selectpicker">
                                    <option selected disabled>preferred food</option>
                                    <option>Indian</option>
                                    <option>Continental</option>
                                    <option>Mexican</option>
                                </select>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-box">
                                <select name="occasion" id="occasion" class="selectpicker">
                                    <option selected disabled>Occasion</option>
                                    <option>Wedding</option>
                                    <option>Birthday</option>
                                    <option>Anniversary</option>
                                </select>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="reserve-book-btn text-center">
                                <button class="hvr-underline-from-center" type="submit" value="SEND" id="submit">BOOK MY TABLE </button>
                            </div>
                        </div>
                        <!-- end col -->
                    </form>
                    <!-- end form -->

                    @endguest
                    
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