@extends('layout.front')

@section('menu')
@include('front.includes.home_menu')
@endsection

@section('content')
<section class="slider-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-0">
                <div class="menu-widget">
                    <p><i class="fa fa-bars"></i>{{__('All Categories')}}</p>
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{route('front.category.show',$category->handle)}}">
                                <img src="{{$category->image}}" alt="">
                                {{$category->name}}
                                <i class="{{$category->subcategories->count()> '0' ? 'fa fa-angle-right':''}}"></i>
                            </a>

                            @if($category->subcategories->count()>0)
                            <div class="mega-menu">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="smartphone" style="width: 170px;">
                                            <h6>{{$category->name}}</h6>
                                            @foreach ($category->subcategories as $subcategory)
                                            <a href="{{route('front.subcategory.show',$subcategory->handle)}}">{{$subcategory->name}}</a>
                                            @endforeach

                                        </div>
                                    </div>


                                </div>
                            </div>


                            @endif

                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 padding-fix-l20">
                <div class="owl-carousel owl-slider">
                    <div class="slider-item slider-item1">
                        <img src="{{asset('front/images/girl-1.png')}}" alt="" class="img1 wow fadeInRight effect"
                            data-wow-duration="1s" data-wow-delay="0s">
                        <div class="slider-box">
                            <div class="slider-table">
                                <div class="slider-tablecell">
                                    <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.5s">
                                        <h5>{{__('Big Sale')}}</h5>
                                    </div>
                                    <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.6s">
                                        <h2>{{__('New Product Collection')}}</h2>
                                    </div>
                                    <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.7s">
                                        <p>{{__('Save Up To 25% Off')}}</p>
                                    </div>
                                    <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.8s">
                                        <a href="#">{{__('Shop Now')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-item slider-item2">
                        <img src="{{asset('front/images/girl-2.png')}}" alt="" class="img2 wow fadeInRight effect"
                            data-wow-duration="1s" data-wow-delay="0s">
                        <div class="slider-box">
                            <div class="slider-table">
                                <div class="slider-tablecell text-right">
                                    <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.5s">
                                        <h5>{{__('Home Appliance')}}</h5>
                                    </div>
                                    <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.6s">
                                        <h2>{{__('Top Quality Products')}}</h2>
                                    </div>
                                    <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.7s">
                                        <p>{{__('Save Up To 50% Off')}}</p>
                                    </div>
                                    <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.8s">
                                        <a href="#">{{__('Shop Now')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-btm-box d-flex justify-content-around">
                    <div class="single-box mr-20">
                        <a href="#"><img src="{{asset('front/images/sb-1.png')}}" alt="" class="img-fluid"></a>
                    </div>
                    <div class="single-box mr-20">
                        <a href="#"><img src="{{asset('front/images/sb-2.png')}}" alt="" class="img-fluid"></a>
                    </div>
                    <div class="single-box">
                        <a href="#"><img src="{{asset('front/images/sb-3.png')}}" alt="" class="img-fluid"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bt-deal">
                            <div class="sec-title">
                                <h6>{{__('Top Rated')}}</h6>
                            </div>
                            <div class="bt-body owl-carousel">
                                <div class="bt-items">
                                    @foreach ($topproducts as $product)
                                    <div class="bt-box d-flex">
                                        <div class="bt-img">
                                            <a href="{{route('front.product.show',$product->handle)}}"><img src="{{asset($product->thumbnail)}}" alt=""></a>
                                        </div>
                                        <div class="bt-content">
                                            <p><a href="{{route('front.product.show',$product->handle)}}">{{$product->name}}</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                @for($i=1; $i<=$product->rating; $i++)
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    @endfor
                                                    @for($i=1; $i<=5-$product->rating; $i++)
                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                        @endfor
                                            </ul>
                                            

                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">{{Session::get('currency_name')}} {{$product->price}}</li>
                                                <li class="list-inline-item">{{Session::get('currency_name')}} {{$product->old_price}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="hm-test">
                            <div class="test-body owl-carousel">
                                <div class="test-item text-center">
                                    <img src="{{asset('front/images/test-1.jpg')}}" alt="" class="img-fluid">
                                    <h6>Mr Ali</h6>
                                    <p>"Download the app and get the world of JakBazar at your fingertips.."</p>
                                </div>
                                <div class="test-item text-center">
                                    <img src="{{asset('front/images/test-2.jpg')}}" alt="" class="img-fluid">
                                    <h6>Mr Abdullah</h6>
                                    <p>"Download the app and get the world of JakBazar at your fingertips.."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="top-rtd">
                            <div class="sec-title">
                                <h6>{{__('Flash Sale')}}</h6>
                            </div>
                            <div class="rt-slider owl-carousel">
                                <div class="rt-items">
                                    @foreach ($sideflashsale as $flash)
                                    {{-- {{dd($flash->product->name)}} --}}

                                    <div class="rt-box d-flex">
                                        <div class="rt-img">
                                            <a href="{{route('front.product.show',$flash->product->handle)}}"><img src="{{asset($flash->product->thumbnail)}}"
                                                    alt=""></a>
                                        </div>
                                        <div class="rt-content">
                                            <p><a href="{{route('front.product.show',$flash->product->handle)}}">{{strlen($flash->product->name) > 25 ? substr($flash->product->name,0,30)."..." : $flash->product->name}}</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                @for($i=1; $i<=$flash->product->rating; $i++)
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    @endfor
                                                    @for($i=1; $i<=5-$flash->product->rating; $i++)
                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                        @endfor
                                            </ul>

                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">{{Session::get('currency_name')}} {{$flash->product->price}}</li>
                                                <li class="list-inline-item">{{Session::get('currency_name')}} {{$flash->product->old_price}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="nw-ltr">
                            <div class="sec-title">
                                <h6>{{__('Newsletter')}}</h6>
                            </div>
                            <div class="nw-box">
                                <p>{{__('Sign Up And Get Latest News, Updates, Offers & Deals')}}</p>
                                <form class="nw-form" action="{{route('front.newsletter')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="country_id" value="{{Session::get('country_id')}}" required>
                                    <input type="text" name="email" placeholder="{{__('Email Here...')}}" required>
                                    <button type="submit" name="button">{{__('Subscribe')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="row">
                    <div class="col-md-12 padding-fix-l20">
                        <div class="ftr-product">
                            <div class="tab-box d-flex justify-content-between">
                                <div class="sec-title">
                                    <h5>{{__('Flash Sale')}}</h5>
                                </div>
                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="all" role="tabpanel">
                                    <div class="tab-slider owl-carousel">
                                        @foreach ($flashsale as $flash)
                                        <div class="tab-item">
                                            <div class="tab-heading">
                                                <ul class="list-unstyled list-inline">
                                                    {{-- <li class="list-inline-item"><a href="{{route('front.category.show',$flash->product->category->handle)}}">{{$flash->product->category->name}}</a></li> --}}
                                                    {{-- <li class="list-inline-item"><a href="#">{{$flash->product->subcategory->name}}</a></li> --}}
                                                    <li class="list-inline-item"><a href="{{route('front.vendor.show',$flash->product->vendor->id)}}">{{$flash->product->vendor->name}}</a>
                                                    </li>
                                                </ul>
                                                <p><a href="{{route('front.product.show',$flash->product->handle)}}">{{strlen($flash->product->name) > 25 ? substr($flash->product->name,0,30)."..." : $flash->product->name}}</a>
                                                </p>
                                            </div>
                                            <div class="tab-img">
                                                <a href="{{route('front.product.show',$flash->product->handle)}}">
                                                <img class="main-img img-fluid"
                                                    src="{{asset($flash->product->thumbnail)}}" alt="">
                                                
                                                </a>
                                                <div class="layer-box">
                                                    
                                                    <a href="{{route('user.addwish',$flash->product->id)}}" class="it-fav" data-toggle="tooltip"
                                                        data-placement="left" title="Favourite"><img
                                                            src="{{asset('front/images/it-fav.png')}}" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="img-content d-flex justify-content-between">
                                                <div>
                                                    <ul class="list-unstyled list-inline fav">
                                                        @for($i=1; $i<=$flash->product->rating; $i++)
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            @endfor
                                                            @for($i=1; $i<=5-$flash->product->rating; $i++)
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            @endfor

                                                    </ul>
                                                    <ul class="list-unstyled list-inline price">
                                                        
                                                        <li class="list-inline-item">{{Session::get('currency_name')}} {{$flash->product->price}}</li>
                                                        <li class="list-inline-item">{{Session::get('currency_name')}} {{$flash->product->old_price}}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div>
                                                    <a href="#" data-toggle="tooltip" class="cart-add"
                                                       product-id="{{ $flash->product->id }}" vendor-id="{{ $flash->product->vendor_id }}" data-placement="top" title="Add to Cart"><img
                                                            src="{{asset('front/images/it-cart.png')}}" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 padding-fix-l20">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="banner">
                                    <a href="#"><img src="{{asset('front/images/banner-1.png')}}" alt=""
                                            class="img-fluid"></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="banner">
                                    <a href="#"><img src="{{asset('front/images/banner-2.png')}}" alt=""
                                            class="img-fluid"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 padding-fix-l20">
                        <div class="new-product">
                            <div class="sec-title">
                                <h5>{{__('Product')}}</h5>
                            </div>
                            <div class="new-slider owl-carousel">
                                @foreach (App\Models\Product::New() as $product)

                                <div class="new-item">
                                    <div class="tab-heading">
                                        <ul class="list-unstyled list-inline">
                                            {{-- <li class="list-inline-item"><a href="{{route('front.category.show',$product->category->handle)}}">{{$product->category->name}},</a>
                                            </li> --}}
                                            <li class="list-inline-item"><a href="{{route('front.vendor.show',$product->id)}}">{{$product->vendor->name}}</a>
                                            </li>
                                        </ul>
                                        <p><a href="{{route('front.product.show',$product->handle)}}">{{strlen($product->name) > 25 ? substr($product->name,0,30)."..." : $product->name}}</a></p>
                                    </div>
                                    <div class="new-img">
                                        <a href="{{route('front.product.show',$product->handle)}}">
                                        <img class="main-img img-fluid" src="{{asset($product->thumbnail)}}"
                                            alt="">
                                        
                                        </a>
                                        <div class="layer-box">
                                            <a href="{{route('user.addwish',$product->id)}}" class="it-fav" data-toggle="tooltip" data-placement="left"
                                                title="Favourite"><img src="{{asset('front/images/it-fav.png')}}"
                                                    alt=""></a>
                                        </div>
                                    </div>
                                    <div class="img-content d-flex justify-content-between">
                                        <div>
                                            <ul class="list-unstyled list-inline fav">
                                                @for($i=1; $i<=$product->rating; $i++)
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    @endfor
                                                    @for($i=1; $i<=5-$product->rating; $i++)
                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                        @endfor
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">{{Session::get('currency_name')}} {{$product->price}}</li>
                                                <li class="list-inline-item">{{Session::get('currency_name')}} {{$product->old_price}}</li>
                                            </ul>
                                        </div>
                                        <div>
                                            <a href="#" data-toggle="tooltip" class="cart-add"
                                                product-id="{{ $product->id }}" vendor-id="{{ $product->vendor_id }}" data-placement="top"
                                                title="Add to Cart"><img src="{{asset('front/images/it-cart.png')}}"
                                                    alt=""></a>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 padding-fix-l20">
                        <div class="banner-two">
                            <a href="#"><img src="{{asset('front/images/banner-3.png')}}" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-md-12 padding-fix-l20">
                        <div class="top-slr">
                            <div class="sec-title">
                                <h5>Top Seller</h5>
                            </div>
                            <div class="slr-slider owl-carousel">

                                <div class="slr-items">
                                    @foreach ($topsales as $key => $product)
                                        <div class="slr-box d-flex">
                                            <div class="slr-img">
                                                <a href="{{route('front.product.show',$product->handle)}}"><img src="{{asset($product->thumbnail)}}" alt=""></a>
                                            </div>
                                            <div class="slr-content">
                                                <p><a href="{{route('front.product.show',$product->handle)}}">{{$product->name}}</a></p>
                                                <ul class="list-unstyled list-inline fav">
                                                    @for($i=1; $i<=$product->rating; $i++)
                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                        @endfor
                                                        @for($i=1; $i<=5-$product->rating; $i++)
                                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            @endfor
                                                </ul>
                                                <ul class="list-unstyled list-inline price">
                                                    <li class="list-inline-item">{{Session::get('currency_name')}} {{$product->price}}</li>
                                                    <li class="list-inline-item">{{Session::get('currency_name')}} {{$product->old_price}}</li>
                                                </ul>
                                            </div>
                                        </div>

                                    @if (($key+1)%3==0 && ($key+1) < count($topsales))
                                        </div>

                                        <div class="slr-items">
                                    @endif

                                    @endforeach
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="col-md-12">
                @include('front.includes.partners')
            </div>
        </div>
    </div>
</section>
@endsection


@section('scripts')
<script>
    let vendor_id = {{ cartVendorId() }};
    let cartQty = {{ cartQty() }};
    
    $(document).ready(function(){
           $('body').on('click', '.cart-add', function(e){
               e.preventDefault();
                let id = $(this).attr('product-id');
                let vendorId = $(this).attr('vendor-id');

                if(cartQty>0 && vendor_id != vendorId){
                    if (confirm("You have selected product from a different vendor. Your previous "+
                     "products will be removed. Are you sure?"));
                        addToCart(id, 1);
                }
                else
                    addToCart(id, 1);                
           });
        });

        function addToCart(productId, qty){
            toastr.success('Product added to cart');
            let data = {
                    product_id : productId,
                    qty : qty ,
                    expectsJson : true,
                };
            $.ajax({
                url : "{{ route('front.cart.add') }}",
                type : 'POST',
                data : data,
                success : function(response){
                    $('.cart-qty').html(response.qty);
                    cartQty = response.qty;
                    vendor_id = response.vendor.id;
                },
                error : function(error){
                    console.log(error);
                    var myWindow = window.open("", "MsgWindow", "width=500,height=250");
                    myWindow.document.write(error.responseText);
                }
            });
        }
</script>
@endsection