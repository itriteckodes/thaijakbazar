@extends('layout.front')

@section('content')
<section class="container">
    <!-- <div class="row d-flex align-items-center justify-content-center" style="margin-top: 170px;">
        <div class="col-12">
           <img class="w-50" src="front/images/thankyou.png" alt="" style="margin-left: 80px;">
            <h5 class="txt1 text-center mt-2">Your order has been palced successfully.</h5>
            <img class="mt-5" src="front/images/emoji.png" alt="" style="margin-left: 55px; width: 65%">
        </div>
    </div> -->
    <div class="card my-4" style="background-color: #eaeaea;">
        <div class="card-body">
            <!-- <h1 class="txt1 text-center">Thank You!</h1>
            <p class="txt1 lead text-center font-weight-light"><strong>Your order placed successfully.</strong> </p>
            <hr> -->
            <img class="" src="{{asset('front/images/thankyou.png')}}" alt="" style="margin-left: 480px; width:20%">
            <h5 class="txt1 text-center mt-2">{{__('Your order has been palced successfully.')}}</h5>
            <h5 class="txt1 text-center mt-2">{{__('Your order number is')}} #{{ $order->id }}</h5>
            {{-- <img class="mt-3" src="front/images/emoji.png" alt="" style="margin-left: 470px; width:13%"> --}}
            <p class="lead text-center mt-2">
                <a class="btn btn-success" href="{{route('front.home')}}" role="button">{{__('GO TO HOME')}}<i class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></a>
            </p>
        </div>
    </div>
</section>
@endsection