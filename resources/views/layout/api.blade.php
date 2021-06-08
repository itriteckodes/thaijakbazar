<!doctype html>
<html class="no-js" lang="zxx">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Jakbazar</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="{{asset('front/images/favicon.ico')}}" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('front/css/assets/bootstrap.min.css')}}">

		<!-- Fontawesome Icon -->
        <link rel="stylesheet" href="{{asset('front/css/assets/font-awesome.min.css')}}">

		<!-- Animate Css -->
        <link rel="stylesheet" href="{{asset('front/css/assets/animate.css')}}">

        <!-- Owl Slider -->
        <link rel="stylesheet" href="{{asset('front/css/assets/owl.carousel.min.css')}}">

        <!-- Custom Style -->
        <link rel="stylesheet" href="{{asset('front/css/assets/normalize.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/style1.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/assets/responsive1.css')}}">
        <link href="{{asset('assets/css/toastr.css')}}" rel="stylesheet" type="text/css">

        @yield('styles')

    </head>
    <body>
        @php($setting = App\Models\GeneralSetting::find(1))
        <!-- Preloader -->
        <div class="preloader">
            <div class="load-list">
                <div class="load"></div>
                <div class="load load2"></div>
            </div>
        </div>
        <!-- End Preloader -->

        <!-- Top Bar -->
        <section class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                        <div class="top-left d-flex">
                            <div class="lang-box">
                                <span><img src="images/fl-eng.png" alt="">English</span>
                              
                            </div>
                            <div class="mny-box">
                                <span>USD</span>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="top-right text-right">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="#"><img src="{{asset('front/images/user.png')}}" alt="">{{__('My Account')}}</a></li>
                                <li class="list-inline-item"><a href="#"><img src="{{asset('front/images/wishlist.png')}}" alt="">{{__('Wishlist')}}</a></li>
                                <li class="list-inline-item"><a href="{{route('front.checkout.index')}}"><img src="{{asset('front/images/checkout.png')}}" alt="">{{__('Checkout')}}</a></li>
                                @if (Auth::check())
                                <li class="list-inline-item"><a href="{{route('logout')}}"><img src="{{asset('front/images/checkout.png')}}" alt="">{{('Logout')}}</a></li>
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
        <section class="logo-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="{{route('front.home')}}" class="m-0"><img src="{{$setting->logo}}" alt="" style="max-width: 90%; margin-top:0px!important"></a>
                        </div>
                    </div>
                    <div class="col-md-5 padding-fix">
                        <form action="{{route('front.search')}}" class="search-bar" method="GET">
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
                                    <p>{{$setting->phone}}</p>
                                </div>
                            </div>
                            <div class="cart-box ml-auto text-center">
                                <a href="{{route('front.cart')}}" class=""cart-btn>
                                    <img src="{{asset('front/images/cart.png')}}" alt="cart">
                                    <span class="cart-qty">{{ App\Helpers\Cart::qty() }}</span>
                                </a>
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
                    <h5>{{__('Shopping Cart')}}</h5>
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
                            <a href="#"><img src="images/cart2.png" alt=""></a>
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
                    <a href="#">{{__('Checkout')}}</a>
                </div>
            </div>
        </div>
        <div class="cart-overlay"></div>
        <!-- End Cart Body -->

        <!-- Sticky Menu -->
        <section class="sticky-menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="sticky-logo">
                            <a href="{{route('front.home')}}"><img src="{{$setting->logo}}" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="main-menu">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="{{route('front.home')}}">{{__('HOME')}} </a>
                                </li>
                                <li class="list-inline-item"><a href="{{route('front.shop')}}">{{__('SHOP')}} </a>
                                </li>
                                <li class="list-inline-item mega-menu"><a>{{__('EXPLORE')}} <i class="fa fa-angle-down"></i></a>
                                    <div class="mega-box">
                                        <div class="row">
                                           
                                            <div class="col-lg-3 col-md-6">
                                                <div class="lt-news">
        
                                            @foreach (App\Models\Category::all() as $key => $category)
        
                                            @if ($key < 12)
                                                
                                            
                                                <a href="{{route('front.category.show',$category->handle)}}">
                                                    <div class="news-box d-flex">
                                                        <div class="news-img">
                                                            <img src="{{$category->mobileimage}}" alt="">
                                                        </div>
                                                        <div class="news-con">
                                                            <p>{{$category->name}}</p>
                                                            <p>Subcategories ({{$category->subcategories->count()}})</p>
                                                            <p>Products ({{$category->products->count()}})</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            @if (($key + 1)%3 == 0 && ($key + 1) < 12)
                                                </div>
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
                                <li class="list-inline-item"><a href="{{route('front.about')}}">{{__('ABOUT')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-2">
                        <div class="carts-area d-flex">
                            <div class="src-box">
                                <form action="#">
                                    <input type="text" name="search" placeholder="{{__('Search Here')}}">
                                    <button type="button" name="button"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="wsh-box ml-auto">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                    <img src="{{asset('front/images/heart.png')}}" alt="favorite">
                                    <span>0</span>
                                </a>
                            </div>
                            <div class="cart-box ml-4">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Shopping Cart" class="cart-btn">
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
        <!-- End Menu Area -->

        <!-- Mobile Menu -->

        <!-- End Mobile Menu -->

        <!-- Slider Area -->
        @yield('slider')
        
        <!-- End Slider Area -->

        <!-- Product Area-->
        @yield('content')
        
        <!-- End Product Area -->

        <!-- Footer Area -->
        <!-- <section class="footer-btm">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>Copyright &copy; 2020 | JAKBAZAR, best for the customers and sellers </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <img src="images/payment.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="back-to-top text-center">
                <img src="images/backtotop.png" alt="" class="img-fluid">
            </div>
        </section> -->
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

        <!-- Custom JS -->
        <script src="{{asset('front/js/plugins.js')}}"></script>
        <script src="{{asset('front/js/custom.js')}}"></script>
        <script src="{{asset('assets/js/toastr.js')}}"></script>

        <script>
            $(document).ready(function(){
                $('.minus, .plus, .t-rem, .chq-out').on('click',function(){
                    $('.preloader').show();
                })
                
                $('.coupon-form, .checkout-form, .order-form').on('submit',function(){
                    $('.preloader').show();
                })
            });
        </script>

	    @toastr_render

        @yield('scripts')

    </body>

</html>
