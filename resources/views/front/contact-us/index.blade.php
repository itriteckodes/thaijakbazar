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
                        <li class="list-inline-item"><span>||</span> {{__('Contact')}}</li>
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
    <div id="map"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="contact-box-tp">
                    <h4>{{__('Contact Info')}}</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-box d-flex">
                            <div class="contact-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="contact-content">
                                <h6>{{__('Our Location')}}</h6>
                                <p style="color: #00401a">{{ $gs->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="contact-box d-flex">
                            <div class="contact-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-content">
                                <h6>{{__('Email Address')}}</h6>
                                <p><a href="mailto:{{$gs->email}}">{{ $gs->email }}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="contact-box d-flex">
                            <div class="contact-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-content">
                                <h6>{{__('Phone Number')}}</h6>
                                <p><a href="tel:{{$gs->phone}}">{{ $gs->phone }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social-link">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item"><a href="{{ $gs->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $gs->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $gs->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $gs->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                       
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="contact-form">
                    <h4>{{__('Get In Touch')}}</h4>
                    <form action="{{route('front.contact-us.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <p><input type="text" id="name" name="name" placeholder="{{__('Full Name')}}" required=""></p>
                            </div>
                            <div class="col-md-6">
                                <p><input type="text" id="email" name="email" placeholder="{{__('Email')}}" required=""></p>
                            </div>
                            <div class="col-md-12">
                                <p><input type="text" id="subject" name="subject" placeholder="{{__('Subject')}}"></p>
                            </div>
                            <div class="col-md-12">
                                <p><textarea name="message" id="message" placeholder="{{__('Message')}}" required=""></textarea>
                                </p>
                            </div>
                            <input type="hidden" name="country_id" value="{{Session::get('country_id')}}" required>
                            <div class="col-md-12">
                                <button type="submit">{{__('Send Message')}}</button>
                            </div>
                        </div>
                        <div id="form-messages"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('front.includes.partners')
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>
    <script src="{{asset('front/js/assets/map.js')}}"></script>
@endsection