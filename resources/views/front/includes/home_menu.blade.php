<section class="menu-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="main-menu my_menu">
                    <ul class="list-unstyled list-inline ml-5 pl-5">
                        <li class="list-inline-item"><a href="{{route('front.home')}}">{{__('HOME') }}</a>

                        </li>
                        <li class="list-inline-item"><a href="{{route('front.shop')}}">{{__('SHOP')}}</a>

                        </li>
                        <li class="list-inline-item mega-menu"><a>{{__('EXPLORE')}} <i class="fa fa-angle-down"></i></a>
                            <div class="mega-box">
                                <div class="row">

                                    <div class="col-lg-3 col-md-6">
                                        <div class="lt-news">

                                            @foreach (App\Models\Category::where('country_id',Session::get('country_id'))->get() as $key => $category)

                                            @if ($key < 12) <a href="{{route('front.category.show',$category->handle)}}">
                                                <div class="news-box d-flex">
                                                    <div class="news-img">
                                                        <img src="{{$category->mobileimage}}" alt="">
                                                    </div>
                                                    <div class="news-con">
                                                        <p>{{$category->name}}</p>
                                                        <p>{{__('Subcategories')}} ({{$category->subcategories->count()}})</p>
                                                        <p>{{__('Products')}} ({{$category->products->count()}})</p>
                                                    </div>
                                                </div>
                                                </a>
                                                @if (($key + 1)%3 == 0 && ($key + 1) < 12) </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="lt-news">
                                                @endif
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                        </li>
                        <li class="list-inline-item"><a href="{{route('front.contact-us.index')}}">{{__('CONTACT')}}</a></li>
                        <li class="list-inline-item"><a href="{{route('front.about')}}">{{__('ABOUT')}}</a></li>
                        <li class="list-inline-item"><a href="{{route('front.blog.index')}}">{{__('BLOGS')}}</a></li>
                        <li class="list-inline-item"><a href="{{route('front.howitworks')}}">{{__('HOW IT WORKS')}}</a></li>
                        <li class="list-inline-item trac-btn"><a href="{{route('front.trackorder')}}">{{__('Track Your Order')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>