<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="ZISWAF Crowdfunding | Zakat | Infaq | Sadaqah | Waqaf" />
    <meta name="description" content="Aplikasi Pendanaan untuk Zakat, Infaq, Sadaqah dan Waqaf untuk kegiatan ZISWAF Produktif khusu UMKM">
    <meta name="author" content="Mufid | Reicka | Nana | Elzar">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Title -->
    <title>ZISWAF Crowdfunding</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{URL::to('/')}}/images/favico.png">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Lightbox -->
    <link href="{{ URL::asset('css/ekko-lightbox.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/dark.css')}}" rel="stylesheet">

    <!-- Calendar -->
    <link href="{{ URL::asset('css/zabuto_calendar.min.css')}}" rel="stylesheet">

    <!-- Template -->
    <link href="{{ URL::asset('style.css')}}" rel="stylesheet">

    <!-- Custom Color -->
    <link href="{{ URL::asset('css/color.css')}}" rel="stylesheet">

    <!-- Custom Box -->
    <link href="{{ URL::asset('css/box.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
</script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
</script>
<![endif]-->
</head>

<body>

    <!-- preloader -->
    <div class='preloader'>
        <div class="preloader-content-wrapper">
            <div class="preloader-content">
                <i class="fa fa-cog fa-3x fa-spin"></i>
            </div>
        </div>
    </div>
    <!-- .preloader -->

    <!-- top bar -->
    <header class="top-bar">
        <div class="container">
            <div class="row">

                <!-- languages -->
                <div class="col-md-4 col-xs-6">
                    <div class="languages nav-root">

                        <!-- trigger -->
                        <div class="pt-nav-trigger">
                            <button><i class="fa fa-globe"></i> English <i class="fa fa-angle-down"></i>
                            </button>
                        </div>
                        <!-- trigger -->

                        <!-- menu list -->
                        <nav class="pt-nav">
                            <ul>
                                <li><a href="#"><i class="fa fa-globe"></i> Indonesia <i class="fa fa-angle-down"></i></a></li>
                            </ul>
                            <!-- .menu list -->
                        </nav>

                    </div>
                </div>
                <!-- .languages -->

                <!-- add info -->
                <div class="col-md-8 col-xs-12 clearfix">
                    <div class="add-info">

                        <!-- menu list -->
                        <nav>
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-phone"></i> +628 5351 4567 11</a>
                                </li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i> mufid@idcloudhost.com</a>
                                </li>
                            </ul>
                            <!-- .menu list -->
                        </nav>

                    </div>
                </div>
                <!-- .add info -->

            </div>
        </div>
    </header>
    <!-- .top bar -->

    <!-- main header -->
    <header class="main-header">

        <div class="container">
            <div class="row">

                <!-- logo -->
                <div class="col-md-2">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{URL::to('/')}}/images/logo.png" title="GoRise" alt="GoRise" />
                        </a>
                    </div>
                </div>
                <!-- .logo -->

                <!-- main nav -->
                <div class="col-md-10">
                    <div class="main-nav nav-root">

                        <!-- trigger -->
                        <div class="pt-nav-trigger">
                            <button><i class="fa fa-bars"></i>Navigation
                            </button>
                        </div>

                        <!-- trigger -->
                        <nav class="pt-nav clearfix">

                            
                            <!-- menu list -->
                            <ul class="clearfix">
                                @if (Auth::guest())
                                    <li><a href="{{ url('/login') }}">Masuk</a></li>
                                    <li><a href="{{ url('/register') }}">Daftar</a></li>
                                    <li class="button"><a href="{{ url('/pendanaan')}}">Lihat Pendanaan</a></li>
                                @else
                                    <li><a href="{{url('/dashboard/home')}}"><img width="30" height="30" src="{{URL::to('images/Dashboard.png')}}">   {{ Auth::user()->name }}</a></li>
                                    <li class="button"><a href="{{ url('/logout') }}">Logout</a></li>
                                @endif
                            </ul>
                            <!-- .menu list -->

                        </nav>
                    </div>
                </div>
                <!-- .main nav -->

            </div>
        </div>
    </header>
    <!-- .main-header -->

        @yield('content')

    <!-- logo & social -->
    <section class="blue-background">
        <div class="container">
            <div class="row">

                <!-- logo -->
                <div class="col-md-6 col-xs-6 text-left">
                    <div class="logo-white">
                        <a href="#">
                            <img src="{{URL::to('/')}}/images/logo_white.png" title="" alt="" />
                        </a>
                    </div>
                </div>
                <!-- .logo -->

                <!-- social -->
                <div class="col-md-6 col-xs-6 text-right">
                    <ul class="social list-inline list-unstyled">
                        <li><a href="#"><i class="fa fa-twitter-square"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook-square"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- .social -->

            </div>
        </div>
    </section>
    <!-- .logo & social -->


    <!-- footer -->
    <footer class="dark-background">
        <div class="container">
            <div class="row">

                <!-- footer menu -->
                <div class="col-md-6 col-xs-6 text-left">
                    <ul class="list-unstyled list-inline">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/about') }}">About</a>
                        </li>
                        <li>
                            <a href="{{ url('/faq') }}">FAQ</a>
                        </li>
                        <li>
                            <a href="{{ url('/tos') }}">TOS</a>
                        </li>
                        <li>
                            <a href="{{ url('/contact') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <!-- footer menu -->

                <!-- copyrights -->
                <div class="col-md-6 col-xs-6 text-right">
                    <p>&copy; 2016 ZISWAF Funding - All rights reserved - made by Mufid</p>
                </div>
                <!-- .copyrights -->
            </div>
        </div>
    </footer>
    <!-- .footer -->

    <!-- jQuery (necessary for Bootstrap 's JavaScript plugins) -->
    <script src="{{ URL::asset('js/jquery-1.11.1.min.js')}}"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ URL::asset('js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>

    <!-- Include all template custom js -->
    <script src="{{ URL::asset('js/jquery.downCount.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap-slider.js')}}"></script>
    <script src="{{ URL::asset('js/zabuto_calendar.min.js')}}"></script>
    <script src="{{ URL::asset('js/ekko-lightbox.js')}}"></script>
    <script src="{{ URL::asset('js/custom.js')}}"></script>
</body>

</html>
