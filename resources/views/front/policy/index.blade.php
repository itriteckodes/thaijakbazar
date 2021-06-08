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
                        @if (Request::is('privacy/policy'))
                        <li class="list-inline-item"><span>||</span>{{__('Privacy Policy') }}</li>
                        @elseif(Request::is('terms/policy'))
                        <li class="list-inline-item"><span>||</span> {{__('Terms & Condition')}}</li>
                        @elseif(Request::is('refund/policy'))
                        <li class="list-inline-item"><span>||</span> {{__('Refund Policy')}}</li>
                        @elseif(Request::is('replacement/policy'))
                        <li class="list-inline-item"><span>||</span> {{__('Replacement Policy')}}</li>
                        @elseif(Request::is('aboutus/policy'))
                        <li class="list-inline-item"><span>||</span> {{__('About Us')}}</li>
                        @endif
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb Area -->

<!-- Terms & Condition -->
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
@endsection