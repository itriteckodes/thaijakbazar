 @extends('layout.api')

 @section('content')
 <section class="breadcrumb-area">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="breadcrumb-box text-center">
                     <ul class="list-unstyled list-inline">
                         <li class="list-inline-item">{{__('Checkout')}}</li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- End Breadcrumb Area -->

 <!-- Checkout -->
 <section class="checkout">
     <div class="container">
         <div class="row">
             @if (App\Helpers\Cart::exists())
             <div class="col-md-7">
                 <form class="checkout-form" action="{{route('api.checkout.store')}}" method="POST">
                     @csrf
                    
                        <input type="hidden" name="expectsJson" value="true"> 
                     <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">
                     <h5 class="txt1" style="color: #004a01;">{{__('Billing Information')}}</h5>
                     <div class="row">
                         <div class="col-md-6">
                             <label class="txt1 text-dark">{{__('Name')}}*</label>
                             <input type="text" name="name" value="{{ Auth::check()?Auth::user()->name:'' }}" placeholder="{{__('Your name')}}" required>
                         </div>

                         <div class="col-md-6">
                             <label class="txt1 text-dark">{{__('Email Address')}}*</label>
                             <input type="text" name="email" value="{{ Auth::check()?Auth::user()->email:'' }}" placeholder="{{__('Your email address')}}" required>
                         </div>
                         <div class="col-md-6">
                             <label class="txt1 text-dark">{{__('Phone')}}*</label>
                             <input type="text" name="phone" value="{{ Auth::check()?Auth::user()->phone:'' }}" placeholder="{{__('Your phone number')}}" required>
                         </div>
                         <div class="col-md-6">
                             <label class="txt1 text-dark">{{__('Town/City')}}*</label>
                             <input type="text" name="city" value="{{ Auth::check()?Auth::user()->city:'' }}" placeholder="{{__('Your town or city name')}}" required>
                         </div>

                         <div class="col-md-12">
                             <label class="txt1 text-dark">{{__('Address')}}*</label>
                             <textarea type="text" name="address" value="{{ Auth::check()?Auth::user()->address:'' }}" placeholder="{{__('Address')}}" required></textarea>
                         </div>

                         <div class="col-md-12">
                             <label class="txt1 text-dark">{{__('Order Note')}}</label>
                             <textarea name="note" placeholder="{{__('Note for your order (optional). Example- special notes for delivery')}}"></textarea>
                         </div>
                     </div>

             </div>
             <div class="col-md-5">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="card shadow">
                             <div class="card-body">
                                 <div class="order-review">
                                     <h5 class="text-center txt1" style="color:#004a01;font-size:18px">{{__('Order Review')}}</h5>
                                     <div class="review-box">
                                         <ul class="list-unstyled">
                                             <li class="txt1">{{__('Product')}} <span>{{__('Total')}}</span></li>
                                             @foreach (App\Helpers\Cart::products() as $product)
                                             <li class="d-flex justify-content-between ">
                                                 <div class="pro">
                                                     <img src="images/sbar-1.png" alt="">
                                                     <p class="txt1">{{ $product->name }}</p>
                                                     <span class="txt1">{{ $product->qty }} X pkr {{ $product->price }}</span>
                                                 </div>
                                                 <div class="prc">
                                                     <p class="txt1">pkr {{ $product->qty * $product->price }}</p>
                                                 </div>
                                             </li>
                                             @endforeach

                                             <li class="subTotal txt1">{{__('Sub Total')}} <span class="subTotalSpan txt1">pkr
                                                     {{ cartSubtotal() }}</span></li>
                                             <li class="calc txt1">{{__('Shipping')}} <span class="subTotalSpan txt1">pkr {{ cartShipping() }}</span>
                                             </li>
                                             <li class="calc txt1">{{__('Tax')}} <span class="subTotalSpan txt1">pkr {{ cartTax() }}</span></li>
                                             <li class="discount txt1">{{__('Discount')}} <span class="subTotalSpan txt1">pkr
                                                     {{ cartDiscount() }}</span></li>
                                             <li class="txt1">{{__('Grand Total')}} <span class="txt1">PKR {{ cartGrandTotal() }}/-</span></li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-12">
                        
                 <button type="submit" class="ord-btn txt1">{{__('Go to Payment')}}</button>
             </div>
             </form>
         </div>
     </div>
     @else
     <div class="col-md-12 text-center">
         <h2>{{__('Your Cart is Empty')}}</h2>
         <br>
         <a href="{{ route('front.home') }}" class="btn btn-success" style="background-color: #00401A">{{__('Continue
             Shopping')}}</a>
     </div>
     @endif


     </div>
     </div>
 </section>
 @endsection