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
                            <li class="list-inline-item"><span>||</span>{{__('Shopping Cart')}}</li>
                        @else
                            <li class="list-inline-item"><a href="{{ route('front.home') }}">{{__('Home')}}</a></li>
                            <li class="list-inline-item"><span>||</span>{{__('Shopping Cart')}}</li>
                        @endif
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb Area -->

<!-- Shopping Cart -->
<section class="shopping-cart">
    <div class="container">
        <div class="row">
            @if (App\Helpers\Cart::exists())
            <div class="col-md-12">
                <div class="cart-table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="t-pro">{{__('Product')}}</th>
                                <th class="t-price">{{__('Price')}}</th>
                                <th class="t-qty">{{__('Quantity')}}</th>
                                <th class="t-qty">{{__('Shipping')}}</th>
                                <th class="t-total">{{__('Total')}}</th>
                                <th class="t-rem"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Helpers\Cart::products() as $product)
                            <tr>
                                <td class="t-pro d-flex">
                                    <div class="t-img">
                                        <a href="#"><img src="{{ $product->images->first()->image}}" width="100" height="100" alt=""></a>
                                    </div>
                                    <div class="t-content">
                                        <p class="t-heading"><a href="#">{{ $product->name }}</a></p>
                                        <ul class="list-unstyled list-inline rate">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <ul class="list-unstyled col-sz">
                                            <li><p><span>{{ $product->category->name }}</span></p></li>
                                            <li><p><span>{{ $product->subcategory->name }}</span></p></li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="t-price">{{Session::get('currency_name')}} {{ $product->price }}</td>
                                <td class="t-qty">
                                    <div class="qty-box">
                                        <div class="quantity buttons_added">
                                            <a href="{{ route('front.cart.decrease') }}?product_id={{ $product->id }}"><input type="button" value="-" class="minus"></a>
                                            <input type="number" step="1" min="1" max="10" value="{{ $product->qty }}" class="qty text" size="4" readonly>
                                            <a href="{{ route('front.cart.increase') }}?product_id={{ $product->id }}"><input type="button" value="+" class="plus"></a>
                                        </div>
                                    </div>
                                </td>
                                <td  class="t-total">{{Session::get('currency_name')}} {{$product->qty * $product->shipping}}</td>
                                <td class="t-total">{{Session::get('currency_name')}} {{ ($product->price * $product->qty) + ($product->qty * $product->shipping) }}</td>
                                <td class="t-rem"><a href="{{ route('front.cart.remove')}}?product_id={{ $product->id }}"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="coupon">
                    <h6>{{__('Discount Coupon')}}</h6>
                    <p>{{__('Enter your coupon code if you have one')}}</p>
                    <form class="coupon-form" action="{{ route('front.cart.coupon.apply') }}" method="POST">
                        @csrf
                        <input type="text" name="code" value="" placeholder="{{__('Your Coupon')}}" required>
                        <button type="submit">{{__('Apply Code')}}</button>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                
            </div>

            <div class="col-md-4">
                <div class="crt-sumry">
                    
                    <h5>{{__('Cart Summery')}}</h5>

                    <ul class="list-unstyled">
                        <li>{{__('Subtotal')}} <span class="cart-subTotal">{{Session::get('currency_name')}} {{ cartSubtotal() }}</span></li>
                        <li>{{__('Shipping')}} <span class="cart-shipping">{{Session::get('currency_name')}} {{ cartShipping() }}</span></li>
                        <li>{{__('Tax')}} <span class="cart-shipping">{{Session::get('currency_name')}} {{ cartTax() }}</span></li>
                        <li>{{__('Discount')}} <span class="cart-discount">{{Session::get('currency_name')}} {{ cartDiscount() }}</span></li>
                        <li>{{__('Grand Total')}} <span class="cart-grandTotal">{{Session::get('currency_name')}} {{ cartGrandTotal() }}</span></li>
                    </ul>
                    
                    <div class="cart-btns text-right">
                        <a href="{{route('front.checkout.index')}}"><button type="button" class="chq-out">{{__('Checkout')}}</button></a>
                    </div>

                </div>
            </div>

            @else
            <div class="col-md-12 text-center">
                <h2>{{__('Your Cart is Empty')}}</h2>
                <br>
                <a href="{{ route('front.home') }}" class="btn btn-success" style="background-color: #00401A">{{__('Continue Shopping')}}</a>
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
