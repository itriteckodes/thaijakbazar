@extends('layout.vendor')

@section('styles')

<style type="text/css">
    .hide{
        display: none;
    }
</style>
@endsection

@section('title')
    {{__('New Deposit')}}
@endsection

@section('content')

<div class="row">

    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title txt4">{{__('Select Deposit Method')}}</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
               <div class="form-group pt-2 txt4">
                   {{-- {{dd(App\Models\DepositMethod::active())}} --}}
                    @foreach (App\Models\DepositMethod::active() as $key=> $method)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input mt-0" name="payment" value="{{$method->handle}}"  data-fouc {{$key == '0' ? 'checked':''}}>
                                {{$method->name}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /basic layout -->
    </div>
</div>
@php($cardpayment = App\Models\DepositMethod::where('handle','cardpayment')->first())
<div class="card cp" id="cardpayment">
    <div class="card-body">
        <div class="cardpayment">
            <div class="row">
                <div class="col-md-12 col-md-offset-3">
                    <div class="panel panel-default credit-card-box">
                        
                        <div class="row">
                            <div class="col-md-6">
                               <img class="d-flex justify-content-end" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYVa8qRkKzzKz4kl3KxPO4Bc808inIYn--kg&usqp=CAU" height="50px">
                            </div>
                            
                        </div>
                        <form role="form" action="{{route('vendor.deposit.store')}}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ $cardpayment->publishable_key }}" id="payment-form">
                        @csrf
    
                        <div class="form-group required txt4">
                            <label>{{__('Name on Card')}}</label>
                            <input class='form-control txt4' size='4' type='text'>
                        </div>
                        
                        <div class="form-group required txt4">
                            <label>{{__('Card Number')}} </label>
                            <input autocomplete='off' class='form-control card-number txt4' size='20' type='text'>
                        </div>
                        
                        <div class='row'>
                            <div class='col-md-4 form-group cvc required txt4'>
                                <label>{{__('CVC')}}</label>
                                 <input autocomplete='off' class='form-control card-cvc txt4' placeholder='{{__('ex. 311')}}' size='4'
                                    type='text'>
                            </div>
                            <div class='col-md-4 form-group expiration required txt4'>
                                <label>{{__('Expiration Month')}}</label>
                                <input class='form-control card-expiry-month txt4' placeholder='{{__('MM')}}' size='2' type='text'>
                            </div>
                            <div class='col-md-4 form-group expiration required txt4'>
                                <label>{{__('Expiration Year')}}</label> 
                                <input class='form-control card-expiry-year txt4' placeholder='{{__('YYYY')}}' size='4' type='text'>
                            </div>
                            <div class="col-md-12 form-group txt4">
                                <div class="col-xs-12">
                                    <label>{{__('Amount')}}</label> 
                                    <input class='form-control txt4' placeholder='{{__
                                    ('Enter Amount')}}' size='4' type='number' name="amount" required>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block txt4" type="submit">{{__('Pay Now')}}
                                    </button>
                                </div>
                            </div>
                        
                        </div>
                       <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert txt4'>{{__('Please correct the errors and try
                                        again.')}}</div>
                                </div>
                            </div>
                        </form>
                    </div>        
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row desc" id="jazzcash">
    <div class="col-md-3"></div>
    <div class="col-md-6 col-md-offset-3">
        <div class="card">
            <div class="card-header bg-transparent">
                <h6 class="card-title text-center txt4">Jazz Cash</h6>
               
            </div>

            <div class="card-img-actions">
                <img class="img-fluid" src="{{asset('front/images/gateway/jazzcash.jpg')}}" alt="" style="height: 320px; width: 100%">
                
            </div>

            {{-- <div class="card-body">
                <p class="card-text">Example of the card image, placed right after card header and before card content body. Image requires <code>.img-fluid</code> class for proper sizing.</p>
            </div> --}}
            <form class="order-form" action="{{route('vendor.deposit.store')}}" method="POST">
                @csrf
                <div class="card-footer">
                    <div class="input-group txt4">
                        <input type="text" name="amount" class="form-control border-right-0" placeholder="{{__('Enter Amount')}}" required>
                        <input type="hidden" name="gateway_id" value="{{gateway()->jazzCash()}}">
                        <span class="input-group-append">
                            <button class="btn bg-blue txt4" type="submit"><i class="icon-paperplane"></i></button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="row desc" id="paypal">
    <div class="col-md-3"></div>
    <div class="col-md-6 col-md-offset-3">
        <div class="card">
            <div class="card-header bg-transparent">
                <h6 class="card-title text-center txt4">Paypal</h6>
               
            </div>

            <div class="card-img-actions">
                <img class="img-fluid" src="{{asset('front/images/gateway/paypal.jpg')}}" alt="" style="height: 320px; width: 100%">
                
            </div>

            {{-- <div class="card-body">
                <p class="card-text">Example of the card image, placed right after card header and before card content body. Image requires <code>.img-fluid</code> class for proper sizing.</p>
            </div> --}}
            <form class="order-form" action="{{route('vendor.deposit.store')}}" method="POST">
                @csrf
                <div class="card-footer">
                    <div class="input-group">
                        <input type="text" class="form-control border-right-0 txt4" placeholder="{{__('Enter Amount')}}" required>
                        <input type="hidden" name="gateway_id" value="{{gateway()->paypal()}}">
                        <span class="input-group-append">
                            <button class="btn bg-blue txt4" type="submit"><i class="icon-paperplane"></i></button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="row desc" id="easypaisa">
    <div class="col-md-3"></div>
    <div class="col-md-6 col-md-offset-3">
        <div class="card">
            <div class="card-header bg-transparent">
                <h6 class="card-title text-center txt4">Easy Paisa</h6>
               
            </div>

            <div class="card-img-actions">
                <img class="img-fluid" src="{{asset('front/images/gateway/easypaisa.jpg')}}" alt="" style="height: 320px; width: 100%">
                
            </div>
            <form class="order-form" action="{{route('vendor.deposit.store')}}" method="POST">
                @csrf
                <div class="card-footer">
                    <div class="input-group">
                        <input type="text" class="form-control border-right-0 txt4" placeholder="{{__('Enter Amount')}}" required>
                        <input type="hidden" name="gateway_id" value="{{gateway()->easyPaisa()}}">
                        <span class="input-group-append">
                            <button class="btn bg-blue txt4" type="submit"><i class="icon-paperplane"></i></button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="row desc" id="ericcoin">
    <div class="col-md-3"></div>
    <div class="col-md-6 col-md-offset-3">
        <div class="card">
            <div class="card-header bg-transparent">
                <h6 class="card-title text-center txt4">Eric Coin</h6>
               
            </div>

            <div class="card-img-actions">
                <img class="img-fluid" src="{{asset('front/images/gateway/eric.jpg')}}" alt="" style="height: 320px; width: 100%">
                
            </div>
            <form class="order-form" action="{{route('vendor.deposit.store')}}" method="POST">
                @csrf
                <div class="card-footer">
                    <div class="input-group">
                        <input type="text" class="form-control border-right-0 txt4" placeholder="{{__('Enter Amount')}}" required>
                        <input type="hidden" name="gateway_id" value="{{gateway()->ericCoin()}}">
                        <span class="input-group-append">
                            <button class="btn bg-blue txt4" type="submit"><i class="icon-paperplane"></i></button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="row desc" id="jakcoin">
    <div class="col-md-3"></div>
    <div class="col-md-6 col-md-offset-3">
        <div class="card">
            <div class="card-header bg-transparent">
                <h6 class="card-title text-center txt4">Jak Coin</h6>
               
            </div>

            <div class="card-img-actions">
                <img class="img-fluid" src="{{asset('front/images/gateway/jak.jpg')}}" alt="" style="height: 320px; width: 100%">
                
            </div>
            <form class="order-form" action="{{route('vendor.deposit.store')}}" method="POST">
                @csrf
                <div class="card-footer">
                    <div class="input-group">
                        <input type="text" class="form-control border-right-0 txt4" placeholder="{{__('Enter Amount')}}" required>
                        <input type="hidden" name="gateway_id" value="{{gateway()->jakCoin()}}">
                        <span class="input-group-append">
                            <button class="btn bg-blue txt4" type="submit"><i class="icon-paperplane"></i></button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
    $("div.desc").hide();
    $("input[name$='payment']").click(function() {
        var test = $(this).val();
        $('.cp').hide();
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
            $form.append("<input type='hidden' name='gateway_id' value='{{gateway()->CardPayment()}}'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>

@endsection