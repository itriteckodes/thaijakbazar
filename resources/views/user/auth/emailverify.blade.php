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
                        <li class="list-inline-item"><span>||</span> {{__('Verify Email')}}</li>
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
                <form action="{{route('sendlink')}}" method="POST">
                    @csrf
                    <h5>{{__('Verify Email')}}</h5>
                    <div class="row">
                       
                        <div class="col-md-12">
                            <label>{{__('Email Address')}}*</label>
                            <input type="text" name="email" placeholder="{{__('Your email address')}}" required>
                        </div>

                        <div class="col-md-12 text-center">
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