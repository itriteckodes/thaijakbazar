<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Jak Bazar</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    {{-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"> --}}
    <link rel="icon" href="{{asset('front/images/favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet"> --}}

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('front/css/assets/bootstrap.min.css')}}">

    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{asset('front/css/assets/font-awesome.min.css')}}">

    <!-- Animate Css -->
    <link rel="stylesheet" href="{{asset('front/css/assets/animate.css')}}" type="text/css">

    <!-- Owl Slider -->
    <link rel="stylesheet" href="{{asset('front/css/assets/owl.carousel.min.css')}}" type="text/css">

    <!-- Custom Style -->
    <link rel="stylesheet" href="{{asset('front/css/assets/normalize.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front/css/assets/responsive.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/toastr.css')}}" type="text/css">

    <style>
        .nohover:hover{
            color: #ffffff !important;
        }
        .mean-container .mean-bar .mean-nav{
            height: 75px;
        }
    </style>

    @yield('styles')
</head>

<body>
    @php($setting = App\Models\GeneralSetting::where('country_id',Session::get('country_id'))->first())
    <!-- Preloader -->
    {{-- @if (!Request::is('/')) --}}
    <div class="preloader">
        <div class="load-list">
            <div class="load"></div>
            <div class="load load2"></div>
        </div>
    </div>
    {{-- @endif --}}
    <!-- End Preloader -->

    <!-- Top Bar -->
    <section class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-4">
                    <div class="top-left d-flex">
                        <div class="lang-box">
                            <span>Thailand</span>
                                {{-- <ul class="list-unstyled">
                                    <a href="{{route('front.language',1)}}"><li>Pakistan</li></a>
                                    <a href="{{route('front.language',2)}}"><li>Thailand</li></a>
                                </ul> --}}
                        </div>
                        <div class="mny-box">
                            <span>{{Session::get('currency_name')}}</span>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="top-right text-right">
                        <ul class="list-unstyled list-inline">
                            @auth
                                <li class="list-inline-item">
                                    <a href="#">
                                        
                                        {{__('Balance')}} {{Session::get('currency_name')}} {{ Auth::user()->account->balance }}/-
                                    </a>
                                    </li>
                            @endauth
                            <li class="list-inline-item"><a href="{{route('user.dashboard')}}"><img src="{{asset('front/images/user.png')}}" alt="">{{__('My Account')}}</a></li>
                            <li class="list-inline-item"><a href="{{route('user.wishlist.index')}}"><img src="{{asset('front/images/wishlist.png')}}" alt="">{{__('Wishlist')}}</a></li>
                            <li class="list-inline-item"><a href="{{route('front.checkout.index')}}"><img src="{{asset('front/images/checkout.png')}}" alt="">{{__('Checkout')}}</a></li>
                            @if (Auth::check())
                            <li class="list-inline-item"><a href="{{route('logout')}}"><img src="{{asset('front/images/checkout.png')}}" alt="">{{__('Logout')}}</a></li>
                            @else
                            <li class="list-inline-item"><a href="{{route('login')}}"><img src="{{asset('front/images/login.png')}}" alt="">{{__('Login')}}</a></li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Top Bar -->

    <!-- Logo Area -->
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 mt-2">
                    <div class="logo">
                        <a href="{{route('front.home')}}" class="m-0"><img src="{{asset($setting->logo)}}" alt="" style="max-width: 88%; margin-top:0px!important"></a>
                    </div>
                </div>
                <div class="col-md-9 logo-area pl-3">
                    <div class="row">
                        <div class="col-md-6 padding-fix">
                            <form action="{{route('front.search')}}" class="search-bar pl-5" method="GET">
                                @csrf
                                <input type="text" name="search" placeholder="{{__("I'm looking for...")}}" required>
                                <button type="submit"><i class="fa fa-search"></i></button>
                                <input type="hidden" name="country_id" value="{{Session::get('country_id')}}" required>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="carts-area d-flex">
                                <div class="call-box d-flex">
                                    <div class="call-ico">
                                        <img src="{{asset('front/images/call.png')}}" alt="">
                                    </div>
                                    <div class="call-content">
                                        <span>{{__('Call Us')}}</span>
                                        <p><a href="tel:{{$setting->phone}}" style="color: #00401A">{{$setting->phone}}</a></p>
                                    </div>
                                </div>
                                <div class="cart-box ml-auto text-center">
                                    <a href="{{route('front.cart')}}" class="" cart-btn>
                                        <img src="{{asset('front/images/cart.png')}}" alt="cart">
                                        <span class="cart-qty">{{ App\Helpers\Cart::qty() }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Logo Area -->

    <!-- Cart Body -->
    <div class="cart-body">
        <div class="close-btn">
            <button class="close-cart"><img src="{{asset('front/images/close.png')}}" alt="">{{__('Close')}}</button>
        </div>
        <div class="crt-bd-box">
            <div class="cart-heading text-center">
                <h5>Shopping Cart</h5>
            </div>
            <div class="cart-content">
                <div class="content-item d-flex justify-content-between">
                    <div class="cart-img">
                        <a href="#"><img src="{{asset('front/images/cart1.png')}}" alt=""></a>
                    </div>
                    <div class="cart-disc">
                        <p><a href="#">SMART LED TV</a></p>
                        <span>1 x $199.00</span>
                    </div>
                    <div class="delete-btn">
                        <a href="#"><i class="fa fa-trash-o"></i></a>
                    </div>
                </div>
                <div class="content-item d-flex justify-content-between">
                    <div class="cart-img">
                        
                    </div>
                    <div class="cart-disc">
                        <p><a href="#">SMART LED TV</a></p>
                        <span>1 x $199.00</span>
                    </div>
                    <div class="delete-btn">
                        <a href="#"><i class="fa fa-trash-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="cart-btm">
                <p class="text-right">Sub Total: <span>$398.00</span></p>
                <a href="#">Checkout</a>
            </div>
        </div>
    </div>
    <div class="cart-overlay"></div>
    <!-- End Cart Body -->

    <!-- Sticky Menu -->
    <section class="sticky-menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <div class="sticky-logo">
                        <a href="{{route('front.home')}}"><img src="{{$setting->logo}}" alt="" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="main-menu">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="{{route('front.home')}}">{{__('HOME')}}</a>
                            </li>
                            <li class="list-inline-item"><a href="{{route('front.shop')}}">{{__('SHOP')}} </a>
                            </li>
                            <li class="list-inline-item mega-menu"><a>{{__('EXPLORE')}}<i class="fa fa-angle-down"></i></a>
                                <div class="mega-box">
                                    <div class="row">

                                        <div class="col-lg-3 col-md-6">
                                            <div class="lt-news">

                                                @foreach (App\Models\Category::where('country_id',Session::get('country_id')) as $key => $category)

                                                @if ($key < 12) <a href="{{route('front.category.show',$category->handle)}}">
                                                    <div class="news-box d-flex">
                                                        <div class="news-img">
                                                            <img src="{{$category->mobileimage}}" alt="">
                                                        </div>
                                                        <div class="news-con">
                                                            <p>{{$category->name}}</p>
                                                            <p>{{__('Subcategories')}} ({{$category->subcategories->count()}})</p>
                                                            <p>{{__('Products')}} ({{$category->products->count()}})</p>
                                                        </div>
                                                    </div>
                                                    </a>
                                                    @if (($key + 1)%3 == 0 && ($key + 1) < 12) </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="lt-news">
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                            </li>
                            <li class="list-inline-item"><a href="{{route('front.contact-us.index')}}">{{__('CONTACT')}}</a></li>
                            <li class="list-inline-item"><a href="{{route('front.howitworks')}}">{{__('HOW IT WORKS')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-2">
                    <div class="carts-area d-flex">
                        <div class="src-box">
                            <form action="{{route('front.search')}}" class="search-bar" method="GET">
                                @csrf
                                <input type="text" name="search" placeholder="{{__('Search Here')}}">
                                <button type="submit" name="button"><i class="fa fa-search"></i></button>
                                <input type="hidden" name="country_id" value="{{Session::get('country_id')}}" required>
                            </form>
                        </div>
                        <div class="wsh-box ml-auto">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                <img src="{{asset('front/images/heart.png')}}" alt="favorite">
                                <span>0</span>
                            </a>
                        </div>
                        <div class="cart-box ml-4">
                            <a href="{{route('front.cart')}}" title="Shopping Cart" class="" cart-btn>
                                <img src="{{asset('front/images/cart.png')}}" alt="cart">
                                <span class="cart-qty">{{ App\Helpers\Cart::qty() }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Sticky Menu -->

    <!-- Menu Area -->
    @yield('menu')
    <!-- End Menu Area -->

    <!-- Mobile Menu -->
    <section class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <a href="{{route('front.home')}}"><img src="{{$setting->logo}}" alt=""></a>
                            @if (Auth::check())
                            <a href="{{route('logout')}}"><span>{{__('Logout')}}</span></a>
                            @else
                            <a href="{{route('login')}}"><span>{{__('Sign In')}}</span></a>
                            @endif
                            <ul class="list-unstyled">
                                <li><a href="{{route('front.home')}}">{{__('Home')}}</a>
                                </li>
                                <li><a href="{{route('front.shop')}}">{{__('Shop')}}</a>
                                </li>
                                <li><a href="{{route('front.contact-us.index')}}">{{__('Contact')}}</a></li>
                                <li><a href="{{route('front.about')}}">{{__('About')}}</a></li>
                                <li><a href="{{route('front.blog.index')}}">{{__('Blog')}}</a></li>
                                <li><a href="{{route('front.howitworks')}}">{{__('How it Works')}}</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Mobile Menu -->

    <!-- Slider Area -->
    @yield('slider')

    <!-- End Slider Area -->

    <!-- Product Area-->
    @yield('content')

    <!-- End Product Area -->

    <!-- Footer Area -->
    <section class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="f-contact">
                        <h5>{{__('Contact Info')}}</h5>
                        <div class="f-add">
                            <i class="fa fa-map-marker"></i>
                            <span>{{__('Address')}} :</span>
                            <p>{{$setting->address}}</p>
                        </div>
                        <div class="f-email">
                            <i class="fa fa-envelope"></i>
                            <span>{{__('Email')}} :</span>
                            <p><a href="mailto:{{$setting->email}}" style="color: #ffffff">{{$setting->email}}</a></p>
                        </div>
                        <div class="f-phn">
                            <i class="fa fa-phone"></i>
                            <span>{{__('Phone')}} :</span>
                            <p><a href="tel:{{$setting->phone}}" style="color: #ffffff">{{$setting->phone}}</p>
                        </div>
                        <div class="f-social">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a target="_blank" href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a target="_blank" href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a target="_blank" href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a target="_blank" href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="f-cat">
                        <h5>{{__('Categories')}}</h5>
                        <ul class="list-unstyled">
                            @foreach (App\Models\Category::where('country_id',Session::get('country_id'))->take(6)->get() as $category)
                            <li><a class="nohover" href="{{route('front.category.show',$category->handle)}}"><i class="fa fa-angle-right"></i>{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="f-link">
                        <h5>{{__('Quick Links')}}</h5>
                        <ul class="list-unstyled">
                            <li><a class="nohover" href="{{route('user.dashboard')}}"><i class="fa fa-angle-right"></i>{{__('My Account')}}</a></li>
                            <li><a class="nohover" href="{{route('front.cart')}}"><i class="fa fa-angle-right"></i>{{__('Shopping Cart')}}</a></li>
                            <li><a class="nohover" href="{{route('user.wishlist.index')}}"><i class="fa fa-angle-right"></i>{{__('My Wishlist')}}</a></li>
                            <li><a class="nohover" href="{{route('front.checkout.index')}}"><i class="fa fa-angle-right"></i>{{__('Checkout')}}</a></li>
                            <li><a class="nohover" href="{{route('vendor.login')}}"><i class="fa fa-angle-right"></i>{{__('Vendor Log In')}}</a></li>
                            <li><a class="nohover" href="{{route('register')}}"><i class="fa fa-angle-right"></i>{{__('Registerd as Vendor')}}</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="f-sup">
                        <h5>{{__('Support')}}</h5>
                        <ul class="list-unstyled">
                            <li><a class="nohover" href="{{route('front.contact-us.index')}}"><i class="fa fa-angle-right"></i>{{__('Contact Us')}}</a></li>
                            <li><a class="nohover" href="{{route('front.about')}}"><i class="fa fa-angle-right"></i>{{__('About Us')}}</a></li>
                            {{-- <li><a href="{{route('front.policy','return')}}"><i class="fa fa-angle-right"></i>Return Policy</a></li> --}}
                            <li><a class="nohover" href="{{route('front.policy','privacy')}}"><i class="fa fa-angle-right"></i>{{__('Privacy Policy')}}</a></li>
                            <li><a class="nohover" href="{{route('front.policy','replacement')}}"><i class="fa fa-angle-right"></i>{{__('Replacement Policy')}}</a></li>
                            <li><a class="nohover" href="{{route('front.policy','terms')}}"><i class="fa fa-angle-right"></i>{{__('Terms & Condition')}}</a></li>
                            <li><a class="nohover" href="{{route('front.policy','refund')}}"><i class="fa fa-angle-right"></i>{{__('Refund Policy')}} </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="f-sup">
                        <h5>{{__('Details')}}</h5>
                        <ul class="list-unstyled">
                            <li><a class="nohover" href="{{route('front.howitworks')}}"><i class="fa fa-angle-right"></i>{{__('How it Works')}}</a></li>

                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <section class="footer-btm">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>{{__('Copyright')}} &copy; 2021 | Jak Bazar</p>
                </div>
                <div class="col-md-6 text-right">
                    {{-- <img src="images/payment.png" alt="" class="img-fluid"> --}}
                </div>
            </div>
        </div>
        <div class="back-to-top text-center">
            <img src="{{asset('front/images/backtotop.png')}}" alt="" class="img-fluid">
        </div>
    </section>
    <!-- End Footer Area -->


    <!-- =========================================
        JavaScript Files
        ========================================== -->

    <!-- jQuery JS -->
    <script src="{{asset('front/js/assets/vendor/jquery-1.12.4.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('front/js/assets/popper.min.js')}}"></script>
    <script src="{{asset('front/js/assets/bootstrap.min.js')}}"></script>

    <!-- Owl Slider -->
    <script src="{{asset('front/js/assets/owl.carousel.min.js')}}"></script>

    <!-- Wow Animation -->
    <script src="{{asset('front/js/assets/wow.min.js')}}"></script>

    <!-- Price Filter -->
    <script src="{{asset('front/js/assets/price-filter.js')}}"></script>

    <!-- Mean Menu -->
    <script src="{{asset('front/js/assets/jquery.meanmenu.min.js')}}"></script>

    <script>
        var currency = '{{Session::get('currency_name')}}';
    </script>

    <!-- Custom JS -->
    <script src="{{asset('front/js/plugins.js')}}"></script>
    <script src="{{asset('front/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/toastr.js')}}"></script>

    @toastr_render

    @yield('scripts')

</body>

</html>