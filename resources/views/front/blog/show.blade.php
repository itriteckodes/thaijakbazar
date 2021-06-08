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
                        <li class="list-inline-item"><a href="{{route('front.home')}}">{{__('Home')}}</a> <span>||</span></li>
                        <li class="list-inline-item"><a href="">{{__('Blogs')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
        <!-- Blog Details -->
        <section class="blog-details align-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8">
                        <div class="blog-d-box">
                            <div class="image-box">
                                <img src="{{ asset($blog->image) }}" alt="" class="img-fluid">
                            </div>
                            <div class="image-content">
                                <h4>{{ $blog->title }}</h4>
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><i class="fa fa-calendar"></i>{{ $blog->created_at->format('M-d-y') }}</li>
                                </ul>
                                <p class="text-dark">{!! $blog->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Details -->
@include('front.includes.partners')
@endsection