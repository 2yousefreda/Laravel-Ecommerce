<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>@yield('title')</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <!-- google font -->
    <link href="{{ url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700') }}" rel="stylesheet">
    <link href="{{ url('https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap') }} rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('/assets/css/all.min.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('/assets/css/owl.carousel.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('/assets/css/magnific-popup.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('/assets/css/animate.css') }}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ asset('/assets/css/meanmenu.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('/assets/css/responsive.css') }}">



</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item"><a href="{{ route('home') }}">Home</a></li>

                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('category') }}">Shop</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('category') }}">Shop</a></li>
                                        <li><a href="{{ route('cart.index') }}">Cart</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="{{ route('cart.index') }}"><i
                                                class="fas fa-shopping-cart"></i></a>

                                    </div>
                                </li>
                                @if (Auth::user() != null)
                                    <li>
                                        <div style=" display:block;" class="dropdown">
                                            <a href="#" class="dropdown-toggle" id="userDropdown"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                style="color: white; text-decoration: none;">
                                                <i class="fa fa-user" style="color: white;"></i>
                                                <p style="color:white; display: inline;">
                                                    {{ $username = Auth::user()->name }}</p>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>


                                                    <a style="color: black" class="dropdown-item"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                        method="POST" style="display: none;">
                                                        @csrf

                                                    </form>

                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @else
                                    <li>
                                        <div class="auth">
                                            <div style=" display:block;">


                                                <p style="color:white; display: inline;"><a
                                                        href="{{ route('register') }}">Register</a></p>
                                                <p style="color:white; display: inline;"><a
                                                        href="{{ route('login') }}">Sign In</a></p>
                                            </div>

                                        </div>
                                    </li>
                                @endif

                            </ul>

                        </nav>

                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->



    @yield('content')



    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="{{ asset('assets/img/company-logos/1.png') }}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('assets/img/company-logos/2.png') }}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('assets/img/company-logos/3.png') }}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('assets/img/company-logos/4.png') }}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('assets/img/company-logos/5.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->

    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium
                            doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li>34/8, East Hukupara, Gifirtok, Sadan.</li>
                            <li>support@fruitkha.com</li>
                            <li>+00 111 222 3333</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('category') }}">Shop</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Subscribe</h2>
                        <p>Subscribe to our mailing list to get the latest updates.</p>
                        <form action="index.html">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights
                        Reserved.<br>
                        Distributed By - <a href="https://themewagon.com/">Themewagon</a>
                    </p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery -->
    <script src=" {{ asset('assets/js/jquery-1.11.3.min.js') }} "></script>
    <!-- bootstrap -->
    <script src=" {{ asset('assets/bootstrap/js/bootstrap.min.js') }} "></script>
    <!-- count down -->
    <script src=" {{ asset('assets/js/jquery.countdown.js') }} "></script>
    <!-- isotope -->
    <script src=" {{ asset('assets/js/jquery.isotope-3.0.6.min.js') }} "></script>
    <!-- waypoints -->
    <script src=" {{ asset('assets/js/waypoints.js') }} "></script>
    <!-- owl carousel -->
    <script src=" {{ asset('assets/js/owl.carousel.min.js') }} "></script>
    <!-- magnific popup -->
    <script src=" {{ asset('assets/js/jquery.magnific-popup.min.js') }} "></script>
    <!-- mean menu -->
    <script src=" {{ asset('assets/js/jquery.meanmenu.min.js') }} "></script>
    <!-- sticker js -->
    <script src=" {{ asset('assets/js/sticker.js') }} "></script>
    <!-- main js -->
    <script src=" {{ asset('assets/js/main.js') }} "></script>




</body>

</html>
