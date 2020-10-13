<div id="site-header">
    <header id="header" class="header-block-top" style="padding-top: 0">
        <div class="container">
            <div class="row">
                <div class="main-menu">
                    <!-- navbar -->
                    <nav class="navbar navbar-default" id="mainNav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="logo">
                                <a class="navbar-brand js-scroll-trigger logo-header" href="{{ route('home') }}">
                                    <img src="{{ url($setting->where('key', 'logo')->first()->value) }}" alt="" style="width:125px;">
                                </a>
                            </div>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="{{ Illuminate\Support\Facades\Route::currentRouteName() == 'home'?'active':'' }}"><a href="{{ route('home') }}">{{ __('file.Home') }}</a></li>
                                @if (Illuminate\Support\Facades\Route::currentRouteName() == 'home')
                                <li><a href="#about">{{ __("file.About Us") }}</a></li>
                                <li><a href="#menu">{{ __('file.Menu') }}</a></li>
                                <li><a href="#our_team">{{ __('file.Team') }}</a></li>
                                <li><a href="#gallery">{{ __('file.Products') }}</a></li>
                                <li><a href="#blog">{{ __('file.Parties') }}</a></li>
                                @else
                                <li class="{{ Illuminate\Support\Facades\Route::currentRouteName() == 'party'?'active':'' }}"><a href="{{ route('party') }}">{{ __('file.Parties') }}</a></li>
                                <li class="{{ Illuminate\Support\Facades\Route::currentRouteName() == 'products'?'active':'' }}"><a href="{{ route('products') }}">{{ __('file.Products') }}</a></li>
                                @endif
                                

                                @auth
                                <li class="{{ Illuminate\Support\Facades\Route::currentRouteName() == 'profile'?'active':'' }}"><a href="{{ route('profile') }}">{{ __('file.Profile') }}</a></li>
                                @endauth
                                <li><a href="#footer">{{ __('file.Contact us') }}</a></li>
                                @guest
                                <li><a href="{{ route('login') }}">{{ __('file.Login') }}</a></li>
                                @else
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('file.logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                    </li>
                                @endguest
                               
                            </ul>
                        </div>
                        <!-- end nav-collapse -->
                    </nav>
                    <!-- end navbar -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </header>
    <!-- end header -->
</div>
<!-- end site-header -->