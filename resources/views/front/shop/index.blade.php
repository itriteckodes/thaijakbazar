@extends('layout.front')

@section('menu')
@include('front.includes.pages_menu')
@endsection

@section('content')
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-box text-center">
                    <ul class="list-unstyled list-inline">
                        @if (Request::is('shop'))
                            <li class="list-inline-item">JakBazar {{__('Shop')}}</li>
                        @elseif(Request::is('category/*'))
                            <li class="list-inline-item">{{$category->name}}</li>
                        @elseif(Request::is('subcategory/*'))
                            <li class="list-inline-item">{{$subcategory->name}}</li>
                            @elseif(Request::is('vendor/*'))
                            <li class="list-inline-item">{{ $vendor->name }}</li>
                        @elseif(Request::is('   rch'))
                            <li class="list-inline-item">{{__('Search Results')}}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb Area -->

<!-- Category Area -->
<section class="category">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="category-box">
                    <div class="sec-title">
                        <h6>{{__('Categories')}}</h6>
                    </div>
                    <!-- accordion -->
                    <div id="accordion">
                        @foreach (App\Models\Category::where('country_id',Session::get('country_id'))->get() as $category)
                        <div class="card">
                            <div class="card-header">
                                <a href="{{$category->subcategories->count()> 0 ? "#":route('front.category.show',$category->handle)}}" data-toggle="{{$category->subcategories->count()> 0 ? 'collapse':''}}" data-target="#cat{{$category->id}}">
                                    <span>{{$category->name}}</span>
                                    <i class="{{$category->subcategories->count()> 0 ? 'fa fa-angle-down':''}}"></i>
                                </a>
                            </div>
                            @if ($category->subcategories->count()>0)
                            <div id="cat{{$category->id}}" class="collapse">
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        @foreach ($category->subcategories as $subcategory)
                                            <li><a href="{{route('front.subcategory.show',$subcategory->handle)}}"><i class="fa fa-angle-right"></i>{{$subcategory->name}}</a></li>
                                        @endforeach
                                       
                                    </ul>
                                </div>
                            </div>
                               
                            @endif
                           
                           
                        </div>
                        @endforeach
                       
                    </div>
                </div>

                <form action="{{route('front.FilterSearch')}}" method="GET">
                    @csrf
                    <div class="cat-brand">
                        <div class="sec-title">
                            <h6>{{__('Rating')}}</h6>
                        </div>
                        <div class="brand-box">
                            <ul class="list-unstyled">
                                <li><input type="radio" name="rating" value="all" checked>{{__('All')}}</li>
                                <li><input type="radio" id="samsung" name="rating" value="5"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
    
                                <li><input type="radio" id="samsung" name="rating" value="4"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></li>
    
                                <li><input type="radio" id="samsung" name="rating" value="3"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></li>
    
                                <li><input type="radio" id="samsung" name="rating" value="2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></li>
    
                                <li><input type="radio" id="samsung" name="rating" value="1"><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="price-range">
                        <div class="sec-title">
                            <h6>{{__('Price')}}</h6>
                        </div>
                        <div class="price-filter">
                            <div id="slider-range"></div>
                            <input type="text" id="amount" name="price" value="">
                            <button type="submit" name="button">{{__('Filter')}}</button>
                        </div>
                        
                    </div>
                    <input type="hidden" name="country_id" value="{{Session::get('country_id')}}" required>
                </form>
               
                {{-- <div class="color">
                    <div class="sec-title">
                        <h6>Color</h6>
                    </div>
                    <ul class="list-unstyled color-box">
                        <li><input type="checkbox" id="red" name="name"><label for="red"><span style="background: red;"></span>Red</label></li>
                        <li><input type="checkbox" id="green" name="name"><label for="green"><span style="background: green;"></span>Green</label></li>
                        <li><input type="checkbox" id="blue" name="name"><label for="blue"><span style="background: blue;"></span>Blue</label></li>
                        <li><input type="checkbox" id="gold" name="name"><label for="gold"><span style="background: gold;"></span>Golden</label></li>
                        <li><input type="checkbox" id="brown" name="name"><label for="brown"><span style="background: brown;"></span>Brown</label></li>
                        <li><input type="checkbox" id="black" name="name"><label for="black"><span style="background: black;"></span>Black</label></li>
                    </ul>
                </div> --}}
                
              
            </div>
            <div class="col-md-9">
                <div class="product-box">
                    <div class="cat-box d-flex justify-content-between">
                        <!-- Nav tabs -->
                        <div class="view">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#grid"><i class="fa fa-th-large"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#list"><i class="fa fa-th-list"></i></a>
                                </li>
                            </ul>
                        </div>
                        {{-- <div class="sortby">
                            <span>Sort By</span>
                            <select class="sort-box">
                                <option>Position</option>
                                <option>Name</option>
                                <option>Price</option>
                                <option>Rating</option>
                            </select>
                        </div>
                        <div class="show-item">
                            <span>Show</span>
                            <select class="show-box">
                                <option>12</option>
                                <option>24</option>
                                <option>36</option>
                            </select>
                        </div>
                        <div class="page">
                            <p>Page 1 of 20</p>
                        </div> --}}
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="grid" role="tabpanel">
                            <div class="row">
                                @if ($products->count() > 0)
                                    @foreach ($products as $product)
                                    <div class="col-lg-3 col-md-6">
                                        <div class="tab-item">
                                            <div class="tab-img">
                                                <a href="{{route('front.product.show',$product->handle)}}">
                                                <img class="main-img img-fluid" src="{{$product->images->first()->image}}" alt="">
                                                <img class="sec-img img-fluid" src="{{$product->images->last()->image}}" alt="">
                                                </a>
                                                <div class="layer-box">
                                                    
                                                    <a href="{{route('user.addwish',$product->id)}}" class="it-fav" data-toggle="tooltip" data-placement="left" title="Favourite"><img src="{{asset('front/images/it-fav.png')}}" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-heading">
                                                <p><a href="{{route('front.product.show',$product->handle)}}">{{$product->name}}</a></p>
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
                                                        <li class="list-inline-item">{{Session::get('currency_name')}} {{$product->old_price}}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div>
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Cart" class="cart-add" vendor-id="{{ $product->vendor_id }}" product-id="{{ $product->id }}"><img src="{{asset('front/images/it-cart.png')}}" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <div class="row col-md-12">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"><h3 style="align-content: center">{{__('No Product Found')}} </h3></div>
                                        <div class="col-md-4"></div>
                                        </div>
                                    </div>
                                @endif
                               
                               
                            </div>
                        </div>
                        <div class="tab-pane fade" id="list" role="tabpanel">
                            <div class="row">
                                @foreach ($products as $product)
                                <div class="col-lg-12 col-md-4">
                                    <div class="tab-item2">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="tab-img">
                                                    <a href="{{route('front.product.show',$product->handle)}}">
                                                    <img class="main-img img-fluid" src="{{$product->images->first()->image}}" alt="">
                                                    <img class="sec-img img-fluid" src="{{$product->images->last()->image}}" alt="">
                                                    </a>
                                                    {{-- <span class="sale">Sale</span> --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-12">
                                                <div class="item-heading d-flex justify-content-between">
                                                    <div class="item-top">
                                                        <ul class="list-unstyled list-inline cate">
                                                            <li class="list-inline-item"><a href="{{route('front.category.show',$product->category->handle)}}">{{$product->category->name}}</a></li>
                                                            <li class="list-inline-item"><a href="{{route('front.subcategory.show',$product->subcategory->handle)}}">{{$product->subcategory->name}}</a></li>
                                                        </ul>
                                                        <p><a href="{{route('front.product.show',$product->handle)}}">{{$product->name}}</a></p>
                                                        <ul class="list-unstyled list-inline fav">
                                                            @for($i=1; $i<=$product->rating; $i++)
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            @endfor
                                                            @for($i=1; $i<=5-$product->rating; $i++)
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                    <div class="item-pr ice">
                                                        <ul class="list-unstyled list-inline price">
                                                            <li class="list-inline-item">{{Session::get('currency_name')}} {{$product->price}}</li>
                                                            <li class="list-inline-item"><del>{{Session::get('currency_name')}} {{$product->old_price}}</del>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="item-content">
                                                    <p>{{$product->description}}</p>
                                                    <a href="#" class="it-cart cart-add" vendor-id="{{ $product->vendor_id }}" product-id="{{ $product->id }}"><span class="it-img"><img src="{{asset('front/images/it-cart.png')}}" alt=""></span><span class="it-title">{{__('Add To Cart')}}</span></a>
                                                    <a href="{{route('user.addwish',$product->id)}}" class="it-fav" data-toggle="tooltip" data-placement="top" title="Favourite"><img src="{{asset('front/images/it-fav.png')}}" alt=""></a>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="pagination-box text-center">
                        {{$products->links()}}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@include('front.includes.partners')
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