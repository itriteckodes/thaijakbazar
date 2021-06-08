@extends('layout.api')


@section('content')
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-box text-center">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">{{__('Shopping Cart')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="">
    @if (App\Helpers\Cart::exists())
    <h4 class="font-weight-bold text-center py-2" style="font-family: 'poppins';font-size: 16px; color:#004a01;">
        {{ App\Helpers\Cart::vendor()->name }}
    </h4>
    @else
    <h4 class="font-weight-bold text-center py-2" style="font-family: 'poppins';font-size: 16px;">JAKBAZAR</h4>
    @endif
</section>
<!-- End Breadcrumb Area -->

<!-- Shopping Cart -->
<section class="shopping-cart">
    <div class="container">
        <div class="row">
            @if (App\Helpers\Cart::exists())
            <div class="col-md-12">
                <div class="cart-table table-responsive">
                    <table class="table" style="border-top: 1px solid #004a01;">
                        <!-- <thead>
                            <tr>
                                <th class="t-pro">Product</th>
                                <th class="t-price">Price</th>
                                <th class="t-qty">Quantity</th>
                                <th class="t-total">Total</th>
                                <th class="t-rem"></th>
                            </tr>
                        </thead> -->
                        <tbody>
                            @foreach (App\Helpers\Cart::products() as $product)
                            <tr style="border-bottom: 1px solid #004a01;">
                                <td class="t-pro d-flex">
                                    <div class="t-img">
                                        <a href="#"><img class="rounded" src="{{ $product->images->first()->image}}" width="150" alt=""></a>
                                    </div>
                                    <div class="t-content">
                                        <p class="t-heading" style="font-family: 'poppins';"><a href="#">{{ $product->name }}</a></p>
                                        <ul class="list-unstyled list-inline rate">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <ul class="list-unstyled col-sz">
                                            <li>
                                                <p style="font-family: 'poppins';"><span>PKR {{ $product->price }} x {{ $product->qty }}</span></p>
                                            </li>
                                            <li>
                                                <p><span style="font-family: 'poppins';">PKR {{ $product->price * $product->qty }}/-</span></p>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                {{-- <td class="t-price">PKR {{ $product->price }}</td> --}}

                                <td>
                                    <a class="" href="{{ route('api.cart.decrease') }}?product_id={{ $product->id }}&api_token={{ Auth::user()->api_token }}">
                                        <input class="minus bg-dark text-light form-control" type="button" value="-" style="font-size: 18px;">
                                    </a>
                                </td>

                                <td class="t-qty">
                                    <div class="qty-box">
                                        <div class="quantity buttons_added">
                                            <input type="number" step="1" min="1" max="10" value="{{ $product->qty }}" class="qty text" size="4" readonly>
                                        </div>
                                    </div>
                                </td>

                                <td class="">
                                    <a href="{{ route('api.cart.increase') }}?product_id={{ $product->id }}&api_token={{ Auth::user()->api_token }}">
                                        <input type="button" value="+" class="plus form-control bg-success text-light" style="font-size: 18px;">
                                    </a>
                                </td>
                                {{-- <td class="t-total">PKR {{ $product->price * $product->qty }}</td> --}}
                                <td class="t-rem"><a href="{{ route('api.cart.remove')}}?product_id={{ $product->id }}&api_token={{ Auth::user()->api_token }}"><i class="fa fa-trash-o bg-danger text-light"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4">
                <div class="coupon">
                    <h6 class="text-center" style="font-family: 'poppins';">{{__('Discount Coupon')}}</h6>
                    <p class="text-center" style="font-family: 'poppins';">{{__('Enter your coupon code if you have one')}}</p>
                    <form class="coupon-form" action="{{ route('api.cart.coupon.apply') }}" method="POST">
                        @csrf
                        <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">
                        <input type="text" name="code" value="" placeholder="{{__('Your Coupon')}}">
                        <button type="submit" style="font-family: 'poppins';">{{__('Apply Code')}}</button>
                    </form>
                </div>
            </div>

            <div class="col-md-4">

            </div>


            <div class="col-md-4 pb-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="text-center" style="font-family: poppins;color:#004a01">{{__('Cart Summary')}}</h5>
                        <div class="crt-sumry">
                            <ul class="list-unstyled">
                                <li class="txt1">{{__('Subtotal')}} <span class="cart-subTotal">PKR {{ cartSubtotal() }}</span></li>
                                <li class="txt1">{{__('Shipping')}} <span class="cart-shipping">PKR {{ cartShipping() }}</span></li>
                                <li class="txt1">{{__('Tax')}} <span class="cart-shipping">PKR {{ cartTax() }}</span></li>
                                <li class="txt1">{{__('Discount')}} <span class="cart-discount">PKR {{ cartDiscount() }}</span></li>
                                <li class="txt1">{{__('Grand Total')}} <span class="cart-grandTotal">PKR {{ cartGrandTotal() }}</span></li>
                            </ul>
                            <div class="cart-btns text-right">
                                <a href="{{route('api.checkout.index')}}?api_token={{ Auth::user()->api_token }}&expectsJson=true"><button type="button" class="chq-out" style="font-family: 'poppins';">{{__('Checkout')}}</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @else
            <div class="col-md-12 text-center" style="margin-top: 45%;">
                <div>
                    <img class="" src="{{asset('front/images/empty.png')}}" alt="" style="width: 35%;">
                </div>

                <h2>{{__('Your Cart is Empty')}}</h2>
                
                <br>

            </div>
            @endif
        </div>
    </div>
</section>

@endsection