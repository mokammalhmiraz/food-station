<!DOCTYPE html>
<html lang="en">

<head>
    <title>Burger</title>
    <!-- Required meta tag -->
    <meta charset="utf-8" />
    <!-- FONT CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- SLICK CSS -->
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <!-- VENOBOX CSS -->
    <link rel="stylesheet" href="{{ asset('css/venobox.min.css') }}">
    <!-- WOW ANIMATED CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <!-- DEFAULT CSS -->
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- RESPONSIVE CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <!-- === HEADER PART START === -->
    <div class="menubar_area">

            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">
                    <img src="images/logo.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("Oni Tech")}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("products")}}">Product</a>
                        {{-- </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li> --}}
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="nav-link dropdown-item" href="{{ url("home")}}"
                                       >
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="nav-link dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        {{-- @if (Route::has('login'))
                            @auth
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link text-sm text-gray-700 underline">Log in</a>
                                </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link ml-4 text-sm text-gray-700 underline">Register</a>
                                </li>
                            @endif
                            @endauth
                        @endif --}}
                    </ul>
                </div>
            </nav>

    </div>
    <!-- === HEADER PART END === -->




    <!-- === BANNER PART START === -->
    <section class="banner_area">
        <div class="banner_bg">
            <!-- === CUSTOM CONTAINER ==== -->
            <div class="custom_container">
                <!-- === BANNER CONTANT ==== -->
                <div class="banner_content section_head">
                    <div class="row">
                        <div class="col-12">
                            <h2>Get  Cashback <br> up  to  50%</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur <br> adipiscing elit. Suspendisse consectetur <br> justo eu
                                nunc consequat.</p>
                            <a href="{{ url("products") }}" class="custom_button">Order Now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- === BANNER PART END === -->



    <!-- === CHEF PART START === -->
    <section class="chef_area">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="section_head text-center">
                        <h2>Our Chef</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vi- <br> vamus lacinia odio vitae
                            vestibulum vestibulum. </p>
                    </div>
                </div>

                <div class="col-4">
                    <div class="chef_info">
                        <div class="chef_img text-center">
                            <img src="images/chef-1.png" alt="images">
                        </div>
                        <div class="chef_bio text-center">
                            <h4>Aiden Hunter</h4>
                            <p>Founder</p>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="chef_info">
                        <div class="chef_img text-center">
                            <img src="images/chef-2.png" alt="images">
                        </div>
                        <div class="chef_bio text-center">
                            <h4>Ethel Ramsey</h4>
                            <p>Co-Founder</p>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="chef_info">
                        <div class="chef_img text-center">
                            <img src="images/chef-3.png" alt="images">
                        </div>
                        <div class="chef_bio text-center">
                            <h4>Fannie Stewart</h4>
                            <p>Co-Founder</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="vendor_float">
            <div class="vendor_1">
                <img src="images/package bg 1.png" alt="">
            </div>
            <div class="vendor_2">
                <img src="images/package bg 2.png" alt="">
            </div>
            <div class="vendor_3">
                <img src="images/package bg 3.png" alt="">
            </div>
            <div class="vendor_4">
                <img src="images/package bg 4.png" alt="">
            </div>
            <div class="vendor_5">
                <img src="images/package bg 5.png" alt="">
            </div>
            <div class="vendor_6">
                <img src="images/package bg 6.png" alt="">
            </div>
        </div>
    </section>
    <!-- === CHEF PART END === -->



    <!-- === BEST-BURGER PART START === -->
    <section class="best_burger_area">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="best_item_photo">
                        <img src="images/best_burger.png" alt="burger-photo" width="100%">
                    </div>
                </div>
                <div class="col-6">
                    <div class="section_head best_item_txt">
                        <h2>Best Burger</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae
                            vestibulum vestibulum. </p>
                        <a href="{{ url("products") }}" class="custom_button">Order Nows</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- === BEST-BURGER PART END === -->



    <!-- === BIG BURGER PART START === -->
    <section class="big_burger_area">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="section_head big_item_txt">
                        <h2>Big Burger</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae
                            vestibulum vestibulum. </p>
                        <a href="{{ url("products") }}" class="custom_button">Order Nows</a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="big_item_photo">
                        <img src="images/big burger.png" alt="burger-photo" width="100%">
                    </div>
                </div>
                <div class="vendor_float">
                    <div class="vendor_1">
                        <img src="images/package bg 1.png" alt="">
                    </div>
                    <div class="vendor_2">
                        <img src="images/package bg 2.png" alt="">
                    </div>
                    <div class="vendor_3">
                        <img src="images/package bg 3.png" alt="">
                    </div>
                    <div class="vendor_4">
                        <img src="images/package bg 4.png" alt="">
                    </div>
                    <div class="vendor_5">
                        <img src="images/package bg 5.png" alt="">
                    </div>
                    <div class="vendor_6">
                        <img src="images/package bg 6.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- === BIG BURGER PART END === -->



    <!-- === STATICS PART START === -->
    <section class="statics_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_head statics_txt text-center">
                        <h2>Statistics</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae
                            vestibulum vestibulum. </p>
                    </div>
                </div>

                <div class="col-4">
                    <div class="counter_txt text-center">
                            <h2>7k</h2>
                            <p>Customer</p>
                    </div>
                </div>

                <div class="col-4">
                    <div class="counter_txt text-center">
                        <h2>109</h2>
                        <p>Outlets</p>
                    </div>
                </div>

                <div class="col-4">
                    <div class="counter_txt text-center">
                        <h2>35</h2>
                        <p>Country</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- === STATICS PART END === -->



    <!-- === PACKAGE PART START === -->
    <section class="package_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_head text-center">
                        <h2>Popular Package</h2>
                    </div>
                </div>

                <div class="col-4">
                    <div class="package_content text-center">
                        <h2>Package I</h2>
                        <div class="package_img">
                            <img src="images/package.png" alt="" width="100%">
                        </div>
                        <h3>$10.00</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="{{ url("products") }}" class="custom_button">Order Nows</a>
                    </div>
                </div>

                <div class="col-4">
                    <div class="package_content text-center">
                        <h2>Package II</h2>
                        <div class="package_img">
                            <img src="images/package.png" alt="" width="100%">
                        </div>
                        <h3>$20.00</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="{{ url("products") }}" class="custom_button">Order Nows</a>
                    </div>
                </div>

                <div class="col-4">
                    <div class="package_content text-center">
                        <h2>Package III</h2>
                        <div class="package_img">
                            <img src="images/package.png" alt="" width="100%">
                        </div>
                        <h3>$30.00</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="{{ url("products") }}" class="custom_button">Order Nows</a>
                    </div>
                </div>
                <div class="vendor_float">
                    <div class="vendor_1">
                        <img src="images/package bg 1.png" alt="">
                    </div>
                    <div class="vendor_2">
                        <img src="images/package bg 2.png" alt="">
                    </div>
                    <div class="vendor_3">
                        <img src="images/package bg 3.png" alt="">
                    </div>
                    <div class="vendor_4">
                        <img src="images/package bg 4.png" alt="">
                    </div>
                    <div class="vendor_5">
                        <img src="images/package bg 5.png" alt="">
                    </div>
                    <div class="vendor_6">
                        <img src="images/package bg 6.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- === PACKAGE PART END === -->



    <!-- === MIDDLE BG PART START === -->
    <section class="bg">
        <div class="overlay">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg_txt text-center">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae
                            vestibulum vestibulum. </p>
                        <h2>Barry Henderson</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- === MIDDLE BG PART END === -->



    <!-- === UPDATE PART START === -->
    <section class="update_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="update_txt section_head text-center">
                        <h2>Don’t miss Our Update</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae
                            vestibulum vestibulum. </p>
                        <div class="update_input">
                            <input type="text" placeholder="Your Email">
                            <div class="input_link">
                                <a href="#" class="custom_buttons">Subscribe</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vendor_float">
                    <div class="vendor_1">
                        <img src="images/package bg 1.png" alt="">
                    </div>
                    <div class="vendor_2">
                        <img src="images/package bg 2.png" alt="">
                    </div>
                    <div class="vendor_3">
                        <img src="images/package bg 3.png" alt="">
                    </div>
                    <div class="vendor_4">
                        <img src="images/package bg 4.png" alt="">
                    </div>
                    <div class="vendor_5">
                        <img src="images/package bg 5.png" alt="">
                    </div>
                    <div class="vendor_6">
                        <img src="images/package bg 6.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- === UPDATE PART END === -->



    <!-- === FOOTER PART START === -->
    <section class="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <div class="left_content">
                        <h4>Title Here</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at dignissim nunc, id
                            maximus ex. Etiam nec dignissim elit, at dignissim enim. </p>
                        <div class="social_link">

                            <i class="fa fa-instagram" aria-hidden="true"></i>
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                            <i class="fa fa-whatsapp" aria-hidden="true"></i>

                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="right_content">
                        <div class="row">
                            <div class="col-4">
                                <div class="list">
                                    <h4>About</h4>
                                    <ul>
                                        <li>
                                            <a href="#">History</a>
                                        </li>
                                        <li>
                                            <a href="#">Our Team</a>
                                        </li>
                                        <li>
                                            <a href="#">Bran Guidelines</a>
                                        </li>
                                        <li>
                                            <a href="#">Terms & Condition</a>
                                        </li>
                                        <li>
                                            <a href="#">Privacy Policy</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="list">
                                    <h4>Service</h4>
                                    <ul>
                                        <li>
                                            <a href="#">How to order</a>
                                        </li>
                                        <li>
                                            <a href="#">Our Product</a>
                                        </li>
                                        <li>
                                            <a href="#">Order Status</a>
                                        </li>
                                        <li>
                                            <a href="#">Promo</a>
                                        </li>
                                        <li>
                                            <a href="#">Payment Method</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="list">
                                    <h4>Other</h4>
                                    <ul>
                                        <li>
                                            <a href="#">Contact Us</a>
                                        </li>
                                        <li>
                                            <a href="#">Help</a>
                                        </li>
                                        <li>
                                            <a href="#">Privacy</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- === FOOTER PART END === -->



    <!-- === HEADER PART START === -->
    <!-- === HEADER PART END === -->



    <!-- JQUERY FILE -->
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
    <!-- POPPER JS -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- MIXITUP js -->
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <!-- VENOBOX js -->
    <script src="{{ asset('js/venobox.min.js') }}"></script>
    <!-- SLICK JS -->
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <!-- COUNTER WAYPOINT JS -->
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <!-- TYPE JS -->
    <script src="{{ asset('js/typed.min.js') }}"></script>
    <!-- COUNTER JS -->
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <!-- WOW ANIMATED JS -->
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <!-- CUSTOM JS -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
