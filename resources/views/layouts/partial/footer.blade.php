<div id="footer" class="footer-main">

    <div class="footer-box pad-top-70">
        <div class="container">
            <div class="row">
                <div class="footer-in-main">
                    <div class="footer-logo">
                        <div class="text-center">
                            <img src="images/logo.png" alt="" style="width: 350px"/>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box-a">
                            <h3>{{ __('file.About Us') }}</h3>
                            <div class="" style="max-height: 212px; overflow: hidden">
                                {!! optional($setting->where('key', 'about_desc')->first())->value_lang !!}
                            </div>

                            <ul class="socials-box footer-socials pull-left">
                                @php
                                    $links = optional($setting->where('key', 'social_links')->first());
                                @endphp
                                @foreach ($links->value_lang as $key=>$link)
                                <li>
                                    <a href="{{ $link }}">
                                        <div class="social-circle-border"><i class="fa fa-{{ $key }}"></i></div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                        <!-- end footer-box-a -->
                    </div>
                    <!-- end col -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box-b">
                            <h3>{{ __('file.Our Menu') }}</h3>
                            <ul>
                                @foreach ($categories->random(5) as $item)
                                <li><a href="#menu">{{ $item->name_lang }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- end footer-box-b -->
                    </div>
                    <!-- end col -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box-c">
                            <h3>{{ __('file.Contact us') }}</h3>
                            <p>
                                <i class="fa fa-map-signs" aria-hidden="true"></i>
                                <span>{{ optional($setting->where('key', 'address')->first())->value_lang }}</span>
                            </p>
                            <p>
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                                <span>
                                    {{ optional($setting->where('key', 'phone')->first())->value_lang }}
                                </span>
                            </p>
                            <p>
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span><a href="mailto:{{ optional($setting->where('key', 'email')->first())->value_lang }}">{{ optional($setting->where('key', 'email')->first())->value_lang }}</a></span>
                            </p>
                        </div>
                        <!-- end footer-box-c -->
                    </div>
                    <!-- end col -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box-d">
                            <h3>{{ __('file.Opening Hours') }}</h3>

                            {!! optional($setting->where('key', 'opening_houres')->first())->value_lang !!}
                        </div>
                        <!-- end footer-box-d -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end footer-in-main -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
        <div id="copyright" class="copyright-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h6 class="copy-title">Dozzan Cafe Made With <i class="fa fa-heart" style="color:#f27"></i>, Copyright &copy; {{ date('Y') }} </h6>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end copyright-main -->
    </div>
    <!-- end footer-box -->
</div>
<!-- end footer-main -->

<a href="#" class="scrollup" style="display: none;">Scroll</a>

<section id="color-panel" class="close-color-panel">
    <a class="panel-button gray2"><i class="fa fa-cog fa-spin fa-2x"></i></a>
    <!-- Colors -->
    <div class="segment">
        <h4 class="gray2 normal no-padding">Color Scheme</h4>
        <a title="orange" class="switcher orange-bg"></a>
        <a title="strong-blue" class="switcher strong-silver-bg"></a>
        <a title="vivid-yellow" class="switcher vivid-yellow-bg"></a>
    </div>
</section>
