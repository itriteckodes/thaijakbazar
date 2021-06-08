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
                        <li class="list-inline-item"><a href="#">{{__('Home')}}</a></li>
                        <li class="list-inline-item"><span>||</span> {{__('Register')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb Area -->

<!-- Register -->
<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('user_register')}}" method="POST">
                    @csrf
                    <h5>{{__('Create Your Account')}}</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <label>{{__('Name')}}*</label>
                            <input type="text" name="name" placeholder="{{__('Your name')}}" value="{{old("name")}}" required>
                        </div>
                       
                        <div class="col-md-12">
                            <label>{{__('Email Address')}}*</label>
                            <input type="text" name="email" placeholder="{{__('Your email address')}}" value="{{old("email")}}" required>
                        </div>
                        <div class="col-md-12">
                            <label>{{__('Phone Number')}}*</label>
                            <input type="text" name="phone" placeholder="{{__('Your phone number"')}} value="{{old("phone")}}" required>
                        </div>
                        <div class="col-md-12">
                            <label>{{__('Password')}}*</label>
                            <input type="password" name="password" placeholder="{{__('Password should be more than 6 character')}}" required>
                        </div>
                        <div class="col-md-12">
                            <label>{{__('Confirm Password')}}*</label>
                            <input type="password" name="confirm_password" placeholder="{{__('Confirm your password')}}" required>
                        </div>
                        <div class="col-md-7">
                            <div>
                                <input type="checkbox" name="t-box" id="t-box" required>
                                <label for="t-box">{{__('I have read the terms and condition.')}}</label>
                            </div>
                        </div>
                        <input type="hidden" name="country_id" value="{{Session::get('country_id')}}" required>
                        <div class="col-md-5 text-right">
                            <button type="submit" name="button">{{__('Submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('front.includes.partners')

@endsection