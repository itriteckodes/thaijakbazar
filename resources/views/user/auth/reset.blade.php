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
                        <li class="list-inline-item"><span>||</span> {{__('Reset Password')}}</li>
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
                <form action="{{route('reset')}}" method="POST">
                    @csrf
                    <h5>{{__('Create New Password')}}</h5>
                    <div class="row">
                       
                        <div class="col-md-12">
                            <label>{{__("Password")}}*</label>
                            <input type="password" name="password" placeholder="{{__('Password should be more than 6 character')}}" required>
                        </div>
                        <div class="col-md-12">
                            <label>{{__('Confirm Password')}}*</label>
                            <input type="password" name="confirm_password" placeholder="{{__('Confirm your password')}}" required>
                        </div>
                       
                        <div class="col-md-12 text-center">
                            <input type="hidden" name="code" value="{{$user->code}}">
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