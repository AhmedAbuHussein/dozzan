@extends('layouts.app')
@section('content')


<div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
    <div class="container"  style="margin-top: 80px;">
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
                    {{ $parties->links() }}
                </div>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end blog-main -->


@endsection
@section('style')
    <style>
        .pagination>li>a, .pagination>li>span{
            min-width: auto;
            font-size: inherit;
        }
    </style>
@endsection 