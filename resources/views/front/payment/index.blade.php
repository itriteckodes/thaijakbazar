@extends('layout.front')

@section('menu')
@include('front.includes.pages_menu')
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
    .panel-title {
        display: inline;
        font-weight: bold;
    }

    .display-table {
        display: table;
    }

    .display-tr {
        display: table-row;
    }

    .display-td {
        display: table-cell;
        vertical-align: middle;
        width: 61%;
    }
</style>
@endsection

@section('content')
@php($cardpayment = App\Models\Gateway::where('handle','cardpayment')->first())
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-box text-center">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item"><a
                                href="{{ route('front.vendor.show',$checkout->vendor->id)}}">{{ $checkout->vendor->name }}</a>
                        </li>
                        <li class="list-inline-item"><span>||</span> {{__('Payment')}}</li>
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
            <div class="col-md-7">

                <h5>{{__('Billing Information')}}</h5>
                <div class="col-md-12 desc" id="cardpayment">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table">
                            <div class="row display-tr">
                                <h3 class="panel-title display-td">{{__('Payment Details')}}</h3>
                                <div class="display-td">
                                    <img class="img-responsive pull-right"
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYVa8qRkKzzKz4kl3KxPO4Bc808inIYn--kg&usqp=CAU">
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">

                            @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                            @endif

                            <form role="form" action="{{route('front.order.store')}}" method="post"
                                class="order-form require-validation" data-cc-on-file="false"
                                data-stripe-publishable-key="{{ $cardpayment->publishable_key }}" id="payment-form">
                                @csrf

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>{{__('Name on Card')}}</label> <input class='form-control'
                                            size='4' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label'>{{__('Card Number')}}</label> <input autocomplete='off'
                                            class='form-control card-number' size='20' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>{{__('CVC')}}</label> <input autocomplete='off'
                                            class='form-control card-cvc' placeholder='{{__('ex. 311')}}' size='4' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>{{__('Expiration Month')}}</label> <input
                                            class='form-control card-expiry-month' placeholder='{{__('MM')}}' size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>{{__('Expiration Year')}}</label> <input
                                            class='form-control card-expiry-year' placeholder='{{__('YYYY')}}' size='4'
                                            type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>{{__('Please correct the errors and try
                                            again.')}}</div>
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- <input type="hidden" name="gateway_id" value="cardpayment">
                                    <input type="hidden" name="checkout_id" value="{{$checkout->id}}"> --}}
                                    <div class="col-xs-12">
                                        <button class="ord-btn" type="submit">{{__('Place Order')}}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <form class="order-form" action="{{route('front.order.store')}}" method="POST">
                        @csrf
                        <div class="card" style="width: 30rem;" id="cod">
                            <img class="card-img-top" src="{{asset('front/images/cod.png')}}" alt="Card image cap"
                                style="height: 240px; width: 100%">
                            <div class="card-body">
                                <h4 class="card-title text-center" style="color: #00401A">{{__('Cash on Delivery')}}</h4>
                                {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                <input type="hidden" name="gateway_id" value="{{gateway()->COD()}}">
                                <input type="hidden" name="checkout_id" value="{{$checkout->id}}">
                                <button class="ord-btn" type="submit">{{__('Place Order')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-md-offset-3 desc" id="paypal">
                    <form class="order-form" action="{{route('front.order.store')}}" method="POST">
                        @csrf
                        <div class="card" style="width: 30rem;">
                            <img class="card-img-top" src="{{asset('front/images/gateway/paypal.jpg')}}"
                                alt="Card image cap" style="height: 240px; width: 100%">
                            <div class="card-body">
                                <h4 class="card-title text-center" style="color: #00401A">{{__('PayPal')}}</h4>

                                <input type="hidden" name="gateway_id" value="{{gateway()->paypal()}}">
                                <input type="hidden" name="checkout_id" value="{{$checkout->id}}">
                                <button class="ord-btn" type="submit">{{__('Place Order')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-md-offset-3 desc" id="jazzcash">
                    <form class="order-form" action="{{route('front.order.store')}}" method="POST">
                        @csrf
                        <div class="card" style="width: 30rem;">
                            <img class="card-img-top" src="{{asset('front/images/gateway/jazzcash.jpg')}}"
                                alt="Card image cap" style="height: 240px; width: 100%">
                            <div class="card-body">
                                <h4 class="card-title text-center" style="color: #00401A">{{__('Jazz Cash')}}</h4>
                                
                                <input type="hidden" name="gateway_id" value="{{gateway()->jazzCash()}}">
                                <input type="hidden" name="checkout_id" value="{{$checkout->id}}">
                                <button class="ord-btn" type="submit">{{__('Place Order')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-md-offset-3 desc" id="easypaisa">
                    <form class="order-form" action="{{route('front.order.store')}}" method="POST">
                        @csrf
                        <div class="card" style="width: 30rem;">
                            <img class="card-img-top" src="{{asset('front/images/gateway/easypaisa.jpg')}}"
                                alt="Card image cap" style="height: 240px; width: 100%">
                            <div class="card-body">
                                <h4 class="card-title text-center" style="color: #00401A">{{__('Easy Paisa')}}</h4>
                                {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                <input type="hidden" name="gateway_id" value="{{gateway()->easyPaisa()}}">
                                <input type="hidden" name="checkout_id" value="{{$checkout->id}}">
                                <button class="ord-btn" type="submit">{{__('Place Order')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-md-offset-3 desc" id="walletpayment">
                    <form class="order-form" action="{{route('front.order.store')}}" method="POST">
                        @csrf
                        <div class="card" style="width: 30rem;">
                            <img class="card-img-top" src="{{asset('front/images/gateway/wallet.png')}}"
                                alt="Card image cap" style="height: 240px; width: 100%">
                            <div class="card-body">
                                <h4 class="card-title text-center" style="color: #00401A">{{__('Wallet')}}</h4>
                                {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                <input type="hidden" name="gateway_id" value="{{gateway()->wallet()}}">
                                <input type="hidden" name="checkout_id" value="{{$checkout->id}}">
                                <button class="ord-btn" type="submit">{{__('Place Order')}}                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-md-offset-3 desc" id="ericcoin">
                    <form class="order-form" action="{{route('front.order.store')}}" method="POST">
                        @csrf
                        <div class="card" style="width: 30rem;">
                            <img class="card-img-top" src="{{asset('front/images/gateway/eric.jpg')}}"
                                alt="Card image cap" style="height: 240px; width: 100%">
                            <div class="card-body">
                                <h4 class="card-title text-center" style="color: #00401A">{{__('Eric Coin')}}</h4>
                                {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                <input type="hidden" name="gateway_id" value="{{gateway()->ericCoin()}}">
                                <input type="hidden" name="checkout_id" value="{{$checkout->id}}">
                                <button class="ord-btn" type="submit">{{__('Place Order')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-md-offset-3 desc" id="jakcoin">
                    <form class="order-form" action="{{route('front.order.store')}}" method="POST">
                        @csrf
                        <div class="card" style="width: 30rem;">
                            <img class="card-img-top" src="{{asset('front/images/gateway/jak.jpg')}}"
                                alt="Card image cap" style="height: 240px; width: 100%">
                            <div class="card-body">
                                <h4 class="card-title text-center" style="color: #00401A">{{__('Jak Coin')}}</h4>
                                <input type="hidden" name="gateway_id" value="{{gateway()->jakCoin()}}">
                                <input type="hidden" name="checkout_id" value="{{$checkout->id}}">
                                <button class="ord-btn" type="submit">{{__('Place Order')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pay-meth">
                            <h5>{{__('Payment Method')}}</h5>
                            <div class="pay-box">
                                <ul class="list-unstyled">
                                    {{-- <li>
                                        <input type="radio" id="pay1" name="gateway_id" value="cod" checked>
                                        <label for="pay1"><span><i class="fa fa-circle"></i></span>Cash On
                                            Delivery</label>

                                    </li> --}}
                                    @foreach (App\Models\Gateway::Where('status',false)->get() as $key => $gateway)
                                    <li>
                                        <input type="radio" id="g{{$gateway->id}}" name="gateway_id"
                                            value="{{$gateway->handle}}" {{$key == 0 ? 'checked':'' }}>
                                        <label for="g{{$gateway->id}}"><span><i
                                                    class="fa fa-circle"></i></span>{{$gateway->name}}</label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 mt-5">
                        <div class="order-review">
                            <h5>{{__('Order Review')}}</h5>
                            <div class="review-box">
                                <ul class="list-unstyled">
                                    <li>{{__('Product')}}<span>{{__('Total')}}</span></li>
                                    @foreach ($checkout->items as $item)
                                    <li class="d-flex justify-content-between">
                                        <div class="pro">
                                            
                                            <p>{{ $item->product->name }}</p>
                                            <span>{{ $item->qty }} X {{Session::get('currency_name')}} {{ $item->product->price }}</span>
                                        </div>
                                        <div class="prc">
                                            <p>{{Session::get('currency_name')}} {{ $item->qty * $item->product->price }}</p>
                                        </div>
                                    </li>
                                    @endforeach

                                    <li class="subTotal">{{__('Sub Total')}} <span class="subTotalSpan">{{Session::get('currency_name')}}
                                            {{ $checkout->subtotal }}</span></li>
                                    <li class="calc">{{__('Shipping')}} <span class="subTotalSpan">{{Session::get('currency_name')}}
                                            {{ $checkout->shipping }}</span>
                                    </li>
                                    <li class="calc">{{__('Tax')}} <span class="subTotalSpan">{{Session::get('currency_name')}} {{ $checkout->tax }}</span></li>
                                    <li class="discount">{{__('Discount')}} <span class="subTotalSpan">{{Session::get('currency_name')}}
                                            {{ $item->discount }}</span></li>
                                    <li>{{__('Grand Total')}} <span>{{Session::get('currency_name')}} {{ $checkout->grand_total }}/-</span></li>
                                </ul>
                            </div>
                        </div>
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
    $(document).ready(function() {
    $("div.desc").hide();
    $("input[name$='gateway_id']").click(function() {
        var test = $(this).val();
        $('#cod').hide();
        $("div.desc").hide();
        $("#" + test).show();
    });
});
</script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.append("<input type='hidden' name='checkout_id' value='{{$checkout->id}}'/>");
            $form.append("<input type='hidden' name='gateway_id' value='{{gateway()->CardPayment()}}'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>

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