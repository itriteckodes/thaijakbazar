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
<!-- Blog Full -->
<section class="blog1">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="blog-box">
                    <div class="blog-img">
                        <a href="{{ route('front.blog.show',$blog->id)}}"><img src="{{asset($blog->image)}}" alt=""
                                class="img-fluid" style="height: 300px; width: 100%;"></a>
                    </div>
                    <div class="blog-content">
                        <h5><a href="{{ route('front.blog.show',$blog->id)}}">{{strlen($blog->title) > 30 ? substr($blog->title,0,29)."..." : $blog->title}}</a></h5>
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><i
                                    class="fa fa-calendar"></i>{{ $blog->created_at->format('M-d-y') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-lg-4 col-md-6">
                        <div class="blog-box">
                            <div class="blog-img">
                                <a href="#"><img src="images/news-5.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="blog-content">
                                <h5><a href="#">Sint eius inventore magni quod.</a></h5>
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><i class="fa fa-user-o"></i><a href="#">John</a></li>
                                    <li class="list-inline-item"><i class="fa fa-calendar"></i>Feb 10, 2020</li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectet adipisic elit. Eligendi necessitatibus repellendus sitti eveniet assumenda totam quisquam, sequi ipsum, adipisci facere pariatur...</p>
                            </div>
                        </div>
        			</div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-box">
                            <div class="blog-img">
                                <a href="#"><img src="images/news-6.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="blog-content">
                                <h5><a href="#">Sint eius inventore magni quod.</a></h5>
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><i class="fa fa-user-o"></i><a href="#">John</a></li>
                                    <li class="list-inline-item"><i class="fa fa-calendar"></i>Feb 10, 2020</li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectet adipisic elit. Eligendi necessitatibus repellendus sitti eveniet assumenda totam quisquam, sequi ipsum, adipisci facere pariatur...</p>
                            </div>
                        </div>
        			</div>
                    <div class="col-md-12">
                        <div class="pagination-box text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="#">1</a></li>
                                <li class="list-inline-item"><a href="#">2</a></li>
                                <li class="active list-inline-item"><a href="#">3</a></li>
                                <li class="list-inline-item"><a href="#">4</a></li>
                                <li class="list-inline-item"><a href="#">...</a></li>
                                <li class="list-inline-item"><a href="#">12</a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div> --}}
        </div>
    </div>
</section>
<!-- End Blog Full -->
@include('front.includes.partners')
@endsection