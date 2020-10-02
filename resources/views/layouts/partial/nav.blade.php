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
                                <li class="active"><a href="#banner">Home</a></li>
                                <li><a href="#about">About us</a></li>
                                <li><a href="#menu">Menu</a></li>
                                <li><a href="#our_team">Team</a></li>
                                <li><a href="#gallery">Gallery</a></li>
                                <li><a href="#blog">Blog</a></li>
                                @auth
                                <li><a href="#reservation">Reservaion</a></li>
                                @endauth
                                <li><a href="#footer">Contact us</a></li>
                                @guest
                                <li><a href="{{ route('login') }}">Login</a></li>
                                @else
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                logout
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