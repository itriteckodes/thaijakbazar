@extends('layout.front')

@section('menu')
@include('front.includes.pages_menu')
@endsection

@section('content')
<section class="breadcrumb-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-box text-center">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item"><a href="{{route('front.home')}}">{{__('Home')}}</a></li>
                        <li class="list-inline-item"><span>||</span> {{__('Track Order')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb Area -->

<!-- Contact -->
@php($gs=App\Models\GeneralSetting::find(1))
<section class="contact-area">
 
    <div class="container-fluid">
        <div class="row">
           <div class="col-lg-3 col-md-3"></div>
            <div class="col-lg-6 col-md-6">
                <div class="contact-form">
                    {{-- <h4>Get In Touch</h4> --}}
                    <form action="{{route('front.post.trackorder')}}" method="POST">
                        @csrf
                        <div class="row mt-5">
                            
                            <div class="col-md-12">
                                <p><input type="text" id="subject" name="order_number" placeholder="{{__('Enter Order')}} #"></p>
                            </div>
                            
                            <div class="col-md-12 text-center">
                                <button type="submit">{{__('Track Order')}}</button>
                            </div>
                        </div>
                        <div id="form-messages"></div>
                        <input type="hidden" name="country_id" value="{{Session::get('country_id')}}" required>
                    </form>
                </div>
            </div>
            
        </div>
        @if (isSet($order))
        <div class="row mt-5 text-center">
            <div class="col-lg-3 col-md-3"></div>
            <div class="col-lg-6 col-md-6">
                @if ($order->status == App\Helpers\OrderStatus::pending())
                    <h3>{{__('Your Order is in Pending State')}}</h3>
                @elseif($order->status == App\Helpers\OrderStatus::accepted())
                    <h3>{{__('Your Order is Accepted')}}</h3> 
                @elseif($order->status == App\Helpers\OrderStatus::rejected())
                    <h3>{{__('Your Order is Rejected')}}</h3> 
                @elseif($order->status == App\Helpers\OrderStatus::dispatched())
                    <h3>{{__('Your Order is Dispatched')}}</h3> 
                @elseif($order->status == App\Helpers\OrderStatus::delivered())
                    <h3>{{__('Your Order is Delivered')}}</h3>
                @elseif($order->status == App\Helpers\OrderStatus::readyToShip())
                    <h3>{{__('Your Order is Ready to Ship')}}</h3>
                @endif
                
            </div>
        </div>
        @endif
        
    </div>
</section>
@include('front.includes.partners')
@endsection
