@extends('layouts.app')
@section('style')
    <style>
        .module {
           width: 100%;
            overflow: hidden;
        }
        .line-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;  
            margin-bottom: 0;
            height: 75px;
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
        .sf-team .thumb a img{
            height: 340px;
        }
        </style>

@endsection
@section('content')


<div id="gallery" class="blog-main pad-top-100 pad-bottom-100">
    <div class="container"  style="margin-top: 80px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title text-center">
                    Our Products
                </h2>
                    <div class="title-custom p-white">{!! optional($setting->where('key', 'gallery_desc')->first())->value !!}</div>
                </div>
                <div class="team-box">

                    <div class="row">
                        @foreach ($products as $item)
                        <div class="col-md-4 col-sm-6" style="margin-bottom: 20px">
                            <div class="sf-team">
                                <div class="thumb">
                                    <a href="#"><img src="{{ url($item->image) }}" alt=""></a>
                                </div>
                                <div class="text-col">
                                    <h3 style="text-transform: capitalize">{{ $item->name }}}</h3>
                                    <div class="module">
                                        <p class="line-clamp">{{ $item->details }}</p>
                                    </div>
                                    @auth
                                        <div class="custom-footer">
                                            <button data-id="{{ $item->id }}" class="btn btn-block {{ $loop->odd?'btn-success':'btn-danger' }} cart-btn">Add To Cart <span>( {{ $item->price . ' SAR' }} )</span></button>
                                        </div>
                                    @else
                                    <div class="custom-footer">
                                        <a href="{{ route('login') }}" class="btn btn-block {{ $loop->odd?'btn-success':'btn-danger' }}">Add To Cart <span>( {{ $item->price . ' SAR' }} )</span></a>
                                    </div>
                                    @endauth
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        @endforeach

                    </div>
                    <!-- end row -->

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

@endsection
@section('script')
    <script>
        $(function() {
            $('.cart-btn').click(function(){
                let id = $(this).data('id');
                let params= {
                    id : id
                }
                $.get("{{ route('add.cart') }}", params, function(res){
                    swal({
                        text: "Product Add To Your Cart",
                        icon: "success"
                    })
                });
            });
        });
    </script>
@endsection 