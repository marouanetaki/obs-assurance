<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Business Assurance Consulting</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="http://quickassurance.test/front/css/style.css">

    <!-- icomoon font -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/icomoon.css')}}">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/responsive.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('front/css/swiper-bundle.min.css')}}">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{asset('front/icon/Favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('front/icon/Favicon.png')}}">

</head>

<body class="header-fixed counter-scroll">
            <!-- preloader -->
            <div class="preload preload-container">
                <div class="preload-logo"></div>
            </div>
            <!-- /preloader -->
        
            <div id="wrapper" class="animsition">
                <div id="page" class="clearfix">
                    <!-- Header Wrap -->
                    <div id="site-header-wrap">
                        <!-- /#site-logo -->
                        <!-- Header -->
                        <header id="site-header">
                            <div id="site-logo" class="clearfix">
                                <div id="site-logo-inner">
                                    <a href="/" rel="home" class="main-logo">
                                        <img src="{{asset('front/images/logo/logo-light.png')}}" alt="consalti" width="183" height="48"
                                            data-retina="{{asset('front/images/logo/logo-light@3x.png')}}" data-width="183"
                                            data-height="48">
                                    </a>
                                </div>
                            </div>
                            <div class="header-box">
                                <!-- Top Bar -->
                                <div id="top-bar">
                                    <div id="top-bar-inner">
                                        <div class="top-bar-content">
                                            <div class="top-bar-left">
                                                <span class="map section-14px-regular">Orange business services, Sala al jadida, Maroc</span>
                                                <span class="mail section-14px-regular"><a
                                                        href="mailto:consalti.business@gmail.com">consalti.business@gmail.com</a></span>
                                            </div>
                                            <div class="top-bar-right">
                                                <span class="phone section-14px-regular"><a href="tel:012345678">+12 3 456
                                                        7890</a></span>
                                                <div class="socials-header">
                                                    <ul class="widget-socials link-style-3">
                                                        <li><a href="#" class="facebook"></a></li>
                                                        <li><a href="#" class="twitter"></a></li>
                                                        <li><a href="#" class="linked-in"></a></li>
                                                        <li><a href="#" class="instagram"></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.top-bar-content -->
                                    </div>
                                </div>
                                <!-- /#top-bar -->
                                <div id="site-header-inner">
                                    <div class="wrap-inner clearfix">
                                        <div class="mobile-button">
                                            <span></span>
                                        </div>
                                        <!-- /.mobile-button -->
                                        <nav id="main-nav" class="main-nav">
                                            <ul id="menu-primary-menu" class="menu">
                                                <li class="menu-item current-menu-item">
                                                    <a href="/">Acceuil</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Qui sommes-nous</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Services</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="{{ route('contact') }}">Contact</a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <!-- /#main-nav -->
                                    </div>
                                    <!-- /.wrap-inner -->
                                    <div id="site-header-right">
                                        <div class="button-header menu-item">
                                            <a href="{{ url('/login') }}">Mon Espace</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /#site-header-inner -->
                            </div>
                        </header>
                        <!-- /#site-header -->
                    </div>
                    <!-- #site-header-wrap -->

                    @yield('content')
            <!-- Footer -->
            <footer id="footer" class="clearfix">
                <div id="footer-top" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="footer-schedule">
                                <div class="heading-schedule">
                                    <h2 class="section-40px-barlow font-weight-500">Need Free Consultation ?</h2>
                                </div>
                                <div class="button-footer">
                                    <a href="/contact" class="button readmore">Book Schedule</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="footer-widgets" class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="logo-footer">
                                <a href="/" rel="home" class="main-logo">
                                    <img src="{{asset('front/images/logo/logo-dark.png')}}" alt="images">
                                </a>
                            </div>
                            <p class="text-widget">Improve efficiency, provide a better customer experience with modern
                                technology services around the world. Our skilled staff, combined</p>
                            <div class="widget-social">
                                <ul>
                                    <li><a href="#" class="facebook-icon"></a></li>
                                    <li><a href="#" class="twitter-icon"></a></li>
                                    <li><a href="#" class="linked-icon"></a></li>
                                    <li><a href="#" class="instagram-icon"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="footer-widgets-nav-menu text-white">
                                <div class="menu-1">
                                    <h3 class="widget-title-link-wrap">Official Info</h3>
                                    <div class="widget-links">
                                        <ul class="link-wrap">
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">Services</a></li>
                                            <li><a href="#">Portfolio</a></li>
                                            <li><a href="#">Our Team</a></li>
                                            <li><a href="#">Contact us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="menu-3">
                                    <h3 class="widget-title-link-wrap style-2">Get in Touch</h3>
                                    <ul class="widget-list-contact link-style-4">
                                        <li>
                                            <span class="meta-address">66 Broklyant, India 3269 Road.</span>
                                        </li>
                                        <li><a href="mailto:olux.moore@gmail.com"
                                                class="meta-mail">yourmail.@gmail.com</a>
                                        </li>
                                        <li><a href="tel:012345678" class="meta-phone">012 345 678 9101</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer><!-- /#footer -->
            <!-- Bottom -->
            <div id="bottom" class="clearfix has-spacer">
                <div id="bottom-bar-inner" class="container">
                    <div class="bottom-bar-inner-wrap">
                        <div class="bottom-bar-content-left link-style-4">
                            <div id="copyright"><span class="text">Copyright © 2022 Cosalti Assurance. <a href="#">Marouane Ettaki</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /#bottom -->

        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <a id="scroll-top"></a>

    <!-- Javascript -->
    <script src="{{asset('front/js/jquery.min.js')}}"></script>
    <script src="{{asset('front/js/wow.min.js')}}"></script>
    <script src="{{asset('front/js/plugin.js')}}"></script>
    <script src="{{asset('front/js/jquery-validate.js')}}"></script>
    <script src="{{asset('front/js/countto.js')}}"></script>
    <script src="{{asset('front/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('front/js/shortcodes.js')}}"></script>
    <script src="{{asset('front/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('front/js/swiper.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>

</body>

</html>