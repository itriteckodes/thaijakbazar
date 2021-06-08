@extends('layout.api')

@section('content')
<section class="container">
    <div class="row" style="margin-top: 40px;">
        <div class="col-12">
            <div class="card" style="background-color: #eaeaea;">
                <div class="card-body">
                    <img class="p-3" src="{{asset('front/images/thankyou.png')}}" alt="" style="width: 70%; margin-left:16%; margin-bottom:50px">
                    <h4 class="txt1 text-center my-4">{{__('Your order has been placed successfully.')}}</h4>
                    <h6 class="txt1 text-center mt-2">{{__('Your order number is')}} #{{ $order->id }}</h6>
                    {{-- <img class="p-3" src="{{asset('front/images/emoji.png')}}" alt="" style="width: 57%; margin-left:19%; margin-top:41%"> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection