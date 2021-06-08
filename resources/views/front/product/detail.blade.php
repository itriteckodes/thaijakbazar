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
                        <li class="list-inline-item"> {{ $product->name }} {{__('Details')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb Area -->

<!-- Single Product Area -->
<section class="sg-product">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-5">
                        <div class="sg-img">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                
                                @foreach ($product->images as $key=> $image)
                                <div class="tab-pane {{$key == 0? 'fade show active':''}}" id="sg{{$image->id}}" role="tabpanel">
                                    <img src="{{$image->image}}" alt="" class="img-fluid">
                                </div>
                                @endforeach
                               
                                
                               
                            </div>
                            <div class="nav d-flex justify-content-between">
                                @foreach ($product->images as $key => $image)
                                    <a class="nav-item nav-link {{$key == 0? 'active':''}}" data-toggle="tab" href="#sg{{$image->id}}"><img src="{{$image->image}}" alt=""></a>
                                @endforeach
                               
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="sg-content">
                            <div class="pro-tag">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><a href="{{route('front.category.show',$product->category->handle)}}">{{$product->category->name}} ,</a></li>
                                    <li class="list-inline-item"><a href="{{route('front.subcategory.show',$product->subcategory->handle)}}">{{$product->subcategory->name}}</a></li>
                                </ul>
                            </div>
                             <div class="pro-name">
                                 <p>{{$product->name}}</p>
                             </div> 
                             <div class="list-inline-item">
                                 <p style="color: gray">({{$product->product_no}})</p>
                             </div>
                             <div class="pro-rating">
                                <ul class="list-unstyled list-inline fav">
                                    @for($i=1; $i<=$product->rating; $i++)
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    @endfor
                                    @for($i=1; $i<=5-$product->rating; $i++)
                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                    @endfor
                                    <li class="list-inline-item"><a class="nav-link" data-toggle="tab" href="#rev">( {{$product->reviews->count()}} {{__('Review')}})</a></li>
                                </ul>
                                
                             </div>
                             <div class="pro-price">
                                 <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item">{{Session::get('currency_name')}} {{$product->price}}</li>
                                    <li class="list-inline-item">{{Session::get('currency_name')}} {{$product->old_price}}
                                    </li>
                                 </ul>
                                 <p>{{__('Vendor')}}: <span><a href="{{route('front.vendor.show',$product->vendor->id)}}">{{$product->vendor->name}}</a></span></p>
                                 <p>{{__('Availability')}}:
                                    @if ($product->stock > 0)
                                       <span>{{__('In Stock')}}</span>
                                    @else 
                                       <span>{{__('Out of Stock')}}</span>
                                    @endif 
                                    
                                 </p>
                             </div>
                             <div class="colo-siz">
                                
                                 <div class="qty-box">
                                     <ul class="list-unstyled list-inline">
                                         <li class="list-inline-item">{{__('Qty')}} :</li>
                                         <li class="list-inline-item quantity buttons_added">
                                             <input type="button" value="-" class="minus">
                                             <input type="number" step="1" min="1" max="10" value="1" class="qty text" size="4" id="qty" readonly>
                                             <input type="button" value="+" class="plus">
                                         </li>
                                     </ul>
                                 </div>
                                 <div class="pro-btns">
                                    @if ($product->stock > 0)
                                      <a href="#" product-id="{{ $product->id }}" vendor-id="{{ $product->vendor_id }}" class="cart-add btn btn-success">{{__('Add To Cart')}}</a>
                                    @endif 
                                      <a href="{{route('user.addwish',$product->id)}}" class="fav-com" data-toggle="tooltip" data-placement="top" title="Wishlist"><img src="{{asset('front/images/it-fav.png')}}" alt=""></a>
                                      
                                 </div>
                             </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="sg-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#pro-det">{{__('Product Details')}}</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rev">{{__('Reviews')}}({{$product->reviews->count()}})</a></li>
                                <li class="nav-item"><a href="{{route('front.vendor.show',$product->vendor->id)}}">{{__('More Products by')}} {{$product->vendor->name}}</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pro-det" role="tabpanel">
                                    <p>
                                        {{$product->description}}
                                    </p>
                                </div>
                                
                                <div class="tab-pane fade" id="rev" role="tabpanel">
                                    @if ($product->reviews->count() > 0)
                                        @foreach ($product->reviews as $review)
                                        <div class="review-box d-flex">
                                            {{-- <div class="rv-img">
                                                <img src="images/testimonial-1.jpg" alt="">
                                            </div> --}}
                                            <div class="rv-content">
                                                <h6>{{$review->user->name}}<span>({{$review->created_at->format('M-d-Y')}})</span></h6>
                                                <ul class="list-unstyled list-inline">
                                                    @for($i=1; $i<=$review->rating; $i++)
                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    @endfor

                                                    @for($i=1; $i<=5-$review->rating; $i++)
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                     @endfor
                                                </ul>
                                                <p>{{$review->comment}}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                       
                                    @endif
                                   
                                    
                                    {{-- <div class="review-form">
                                        <h6>Add Your Review</h6>
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="star-rating">
                                                        <label>Your Rating*</label>
                                                        <span class="fa fa-star-o" data-rating="1"></span>
                                                        <span class="fa fa-star-o" data-rating="2"></span>
                                                        <span class="fa fa-star-o" data-rating="3"></span>
                                                        <span class="fa fa-star-o" data-rating="4"></span>
                                                        <span class="fa fa-star-o" data-rating="5"></span>
                                                        <input type="hidden" name="whatever1" class="rating-value" value="0">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Your Name*</label>
                                                    <input type="text" name="name" required="">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Your Email*</label>
                                                    <input type="text" name="email" required="">
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Your Review*</label>
                                                    <textarea required=""></textarea>
                                                    <button type="submit">Add Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
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
                let qty = $('#qty').val();

                if(cartQty>0 && vendor_id != vendorId){
                    if (confirm("You have selected product from a different vendor. Your previous "+
                     "products will be removed. Are you sure?")){
                        addToCart(id, 1);
                     }
                }
                else
                    addToCart(id, qty);                
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