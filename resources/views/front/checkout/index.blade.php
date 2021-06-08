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
                        @if (App\Helpers\Cart::exists())
                            <li class="list-inline-item"><a href="{{ route('front.vendor.show',App\Helpers\Cart::vendor()->id)}}">{{ App\Helpers\Cart::vendor()->name }}</a></li>
                            <li class="list-inline-item"><span>||</span> {{__('Checkout')}}</li>
                        @else
                        <li class="list-inline-item"><a href="{{route('front.home')}}">{{__('Home')}}</a></li>
                        <li class="list-inline-item"><span>||</span> {{__('Checkout')}}</li>
                        @endif
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
                <form class="checkout-form" action="{{route('front.checkout.store')}}" method="POST">
                    @csrf
                    <h5>{{__('Billing Information')}}</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{__('Name')}}*</label>
                            <input type="text" name="name" value="{{ Auth::check()?Auth::user()->name:'' }}" placeholder="{{__('Your name')}}" required>
                        </div>

                        <div class="col-md-6">
                            <label>{{__('Email Address')}}*</label>
                            <input type="text" name="email" value="{{ Auth::check()?Auth::user()->email:'' }}" placeholder="{{__('Your email address')}}" required>
                        </div>
                        <div class="col-md-6">
                            <label>{{__('Phone')}}*</label>
                            <input type="text" name="phone" value="{{ Auth::check()?Auth::user()->phone:'' }}" placeholder="{{__('Your phone number')}}" required>
                        </div>
                        <div class="col-md-6">
                            <label>{{__('Town/City')}}*</label>
                            <input type="text" name="city" value="{{ Auth::check()?Auth::user()->city:'' }}" placeholder="{{__('Your town or city name')}}" required>
                        </div>

                        <div class="col-md-12">
                            <label>{{__('Address')}}*</label>
                            <textarea type="text" name="address" value="" placeholder="{{__('Address')}}" required>{{ Auth::check()?Auth::user()->address:'' }}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label>{{__('Order Note')}}</label>
                            <textarea name="note"
                                placeholder="{{__('Note for your order (optional). Example- special notes for delivery')}}"></textarea>
                        </div>
                    </div>

            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="order-review">
                            <h5>{{__('Order Review')}}</h5>
                            <div class="review-box">
                                <ul class="list-unstyled">
                                    <li>{{__('Product')}} <span>{{__('Total')}}</span></li>
                                    @foreach (App\Helpers\Cart::products() as $product)
                                    <li class="d-flex justify-content-between">
                                        <div class="pro">
                                            <img src="{{$product->images->first()->image}}" alt="">
                                            <p>{{ $product->name }}</p>
                                            <span>{{ $product->qty }} X PKR {{ $product->price }}</span>
                                        </div>
                                        <div class="prc">
                                            <p>{{Session::get('currency_name')}}  {{ $product->qty * $product->price }}</p>
                                        </div>
                                    </li>
                                    @endforeach

                                    <li class="subTotal">{{__('Sub Total')}} <span class="subTotalSpan">{{Session::get('currency_name')}}
                                            {{ cartSubtotal() }}</span></li>
                                    <li class="calc">{{__('Shipping')}} <span class="subTotalSpan">{{Session::get('currency_name')}} {{ cartShipping() }}</span>
                                    </li>
                                    <li class="calc">{{__('Tax')}}<span class="subTotalSpan">{{Session::get('currency_name')}} {{ cartTax() }}</span></li>
                                    <li class="discount">{{__('Discount')}} <span class="subTotalSpan">{{Session::get('currency_name')}}
                                            {{ cartDiscount() }}</span></li>
                                    <li>{{__('Grand Total')}} <span>{{Session::get('currency_name')}} {{ cartGrandTotal() }}/-</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        {{-- <div class="pay-meth">
                            <h5>Payment Method</h5>
                            <div class="pay-box">
                                <ul class="list-unstyled">
                                    <li>
                                        <input type="radio" id="pay1" name="payment" value="cod" checked>
                                        <label for="pay1"><span><i class="fa fa-circle"></i></span>Cash On Delivery</label>
                                       
                                    </li>
                                    @foreach (App\Models\Gateway::Where('status',false)->get() as $gateway)
                                    <li>
                                        <input type="radio" id="g{{$gateway->id}}" name="payment"
                        value="{{$gateway->name}}">
                        <label for="g{{$gateway->id}}"><span><i
                                    class="fa fa-circle"></i></span>{{$gateway->name}}</label>
                        </li>
                        @endforeach


                        </ul>
                    </div>
                </div> --}}
                <input type="hidden" name="country_id" value="{{Session::get('country_id')}}" required>
                <button type="submit" class="ord-btn">{{__('Go to Payment')}}</button>
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
@include('front.includes.partners')
@endsection

@section('scripts')
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
@endsection