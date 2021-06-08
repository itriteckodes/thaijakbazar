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
                        <li class="list-inline-item"><a href="{{route('front.home')}}">{{__('Home')}}</a></li>
                        <li class="list-inline-item"><span>||</span>{{__('Vendor Login')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="n-customer">
                    <h5>{{__('New Vendor')}}</h5>
                    <p>{{__("Join now ! Pakistan's largest and first blockchain based E-Commerce plattform.")}} <br>
                       {{__(' Get exclusive updates and notifications after registering on JakBazar. Happy Shopping!')}}</p>
                    <a href="{{route('register')}}">{{__("Create Vendor Account")}}</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="r-customer">
                    <h5>{{__('Registered Vendor')}}</h5>
                    <p>{{__('If you have an account with us, please log in.')}}</p>
                    <form action="{{route('vendor.login.post')}}" method="POST">
                        @csrf
                        <div class="emal">
                            <label>{{__('User name or email address')}}</label>
                            <input type="text" name="email">
                        </div>
                        <div class="pass">
                            <label>{{__('Password')}}</label>
                            <input type="password" name="password">
                        </div>
                        <div class="d-flex justify-content-between nam-btm">
                            <div>
                                <input type="checkbox" name="remember" id="rmme">
                                <label for="rmme">{{__('Remember Me')}}</label>
                            </div>
                            <div>
                                <a href="{{route('password.forget')}}">{{__('Lost your password?')}}</a>
                            </div>
                            
                        </div>
                        <button type="submit" name="button">{{__('Log In')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Log In -->

@include('front.includes.partners')

@endsection