@extends('layout.front')

@section('menu')
    @include('front.includes.pages_menu')
@endsection


@section('content')

@php
 $policy = App\Models\Policy::where('key','aboutus')->where('country_id',Session::get('country_id'))->first();
@endphp
<section class="breadcrumb-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-box text-center">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item"><a href="{{route('front.home')}}">{{__('Home')}}</a> <span>||</span></li>
                        <li class="list-inline-item"><a href="">{{__('About Us')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb Area -->

<!-- About Area -->
<section class="term-condition">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="term-box">
                    {!! $policy->data !!}
                </div>
            </div>
        </div>
    </div>
</section>
@include('front.includes.partners')
@endsection