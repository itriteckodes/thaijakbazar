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
                        
                        
                        <li class="list-inline-item"><span>||</span> {{__('How it Works')}}</li>
                       
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="term-condition">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="term-box">
                    {!! $howitworks->data !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection