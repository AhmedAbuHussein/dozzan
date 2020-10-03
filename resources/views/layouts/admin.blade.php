<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ahmed Shaker">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon"  href="{{ url('uploads/logos/cool.png') }}">
    <title>Admin | Dashboard</title>

    <script src="{{ url('js/app.js') }}"></script>
    <script src="{{ url('js/datatables.min.js') }}"></script>
    <script src="{{ url('js/sweetalert.js') }}"></script>
    <script src="{{ url('js/multiple-select.js') }}"></script>

    <script src="{{ url('color/js/colorpicker.js') }}"></script>
    <script src="{{ url('color/js/eye.js') }}"></script>
    <script src="{{ url('color/js/utils.js') }}"></script>

    <!-- Custom CSS -->
    <link href="{{ url('res/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/multiple-select.css') }}" rel="stylesheet">
    <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('color/css/colorpicker.css') }}" rel="stylesheet">
    <link href="{{ url('css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ url('css/simditor.css') }}" rel="stylesheet" />

    @yield('style')
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .invalid-feedback{
            display: block;
        }
        .sidebar-nav ul .sidebar-item{
            width: auto;
        }
        .truncate-1-line{
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 450px;
            line-height: 72px;
            margin-bottom: 0;
        }
    </style>
    

</head>

<body>
<div id="app">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header nav" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="{{ url('admin') }}" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
 
                                <img style="max-width:200px; " src="{{ url('images/admin.png') }}" alt="Dozzan" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                        </a>
                    </div>
                   
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
            
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ml-auto">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ url('images/logo.png') }}" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                              <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                </a>

                             <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>                           
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>

        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.index') }}" aria-expanded="false">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">{{ __('Dashboard') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.users.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">{{ __('Users') }}</span>
                            </a>
                        </li>
                       
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.categories.index') }}" aria-expanded="false">
                                <i class="mdi mdi-cup-water"></i>
                                <span class="hide-menu">{{ __('Categories') }}</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.products.index') }}" aria-expanded="false">
                                <i class="mdi mdi-arrange-bring-forward"></i>
                                <span class="hide-menu">{{ __('Products') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.orders.index') }}" aria-expanded="false">
                                <i class="mdi mdi-access-point"></i>
                                <span class="hide-menu">{{ __('Orders') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.team.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-multiple-minus"></i>
                                <span class="hide-menu">{{ __('Team') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.setting.index') }}" aria-expanded="false">
                                <i class="mdi mdi-settings"></i>
                                <span class="hide-menu">{{ __('Setting') }}</span>
                            </a>
                        </li>
                        

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <div style="min-height: 85vh">
                @yield('content')
            </div>

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved for Dozzan &copy; {{ date('Y') }}
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
</div>
    @if (\Session::has('message'))

    <script>
        $(function() {

            swal({
                text:"{{ \Session::get('message') }}",
                icon:"{{ \Session::get('icon') }}"
            });

        })
        
    </script>
        
    @endif

    <script src="{{ url('res/sparkline.js') }}"></script>
    <script src="{{ url('res/waves.js') }}"></script>
    <script src="{{ url('res/sidebarmenu.js') }}"></script>
    <script src="{{ url('res/custom.js') }}"></script>
    <script src="{{ url('js/module.js') }}"></script>
    <script src="{{ url('js/uploader.js') }}"></script>
    <script src="{{ url('js/hotkeys.js') }}"></script>
    <script src="{{ url('js/dompurify.js') }}"></script>
    <script src="{{ url('js/simditor.js') }}"></script>
    <script>
        $(function() {

            $('.confirm').click(function(){
                return confirm("Are You Sure?");
            });

            function readURL(input,$seleector) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
        
                    reader.onload = function(e) {
                        $($seleector).attr('src', e.target.result);
                    }
        
                    reader.readAsDataURL(input.files[0]);
              }
            }
        
            $("input[type='file']").change(function() {
                var preview = $(this).siblings('label').children('img.preview');
                console.log(preview);
                readURL(this,preview);
            });


            $(".multiSelect").multipleSelect({
                filter: true,
                placeholderText: '-- Select --',
            });
        });
    </script>
    
    @yield('script')

</body>

</html>
