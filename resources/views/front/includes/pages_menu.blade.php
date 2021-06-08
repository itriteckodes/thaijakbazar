<section class="menu-area2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-0">
                <div class="sidemenu">
                    <p>{{__('All Categories')}} <i class="fa fa-bars"></i></p>
                    <ul class="list-unstyled gt-menu">
                        @foreach (App\Models\Category::where('country_id',Session::get('country_id'))->get() as $category)
                        <li><a href="{{route('front.category.show',$category->handle)}}"><img src="{{$category->image}}" alt="">{{$category->name}}<i class="{{$category->subcategories->count()> '0' ? 'fa fa-angle-right':''}}"></i></a>
                            @if($category->subcategories->count()>0)
                            <div class="mega-menu">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="smartphone">
                                            <h6>{{$category->name}}</h6>
                                            @foreach ($category->subcategories as $subcategory)
                                                <a href="{{route('front.subcategory.show',$subcategory->handle)}}">{{$subcategory->name}}</a>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="main-menu">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item"><a href="{{route('front.home')}}">{{__('HOME')}}</a>
                            
                        </li>
                        <li class="list-inline-item"><a href="{{route('front.shop')}}">{{__('SHOP')}}</a>
                            
                        </li>
                        <li class="list-inline-item mega-menu"><a>{{__('EXPLORE')}} <i class="fa fa-angle-down"></i></a>
                            <div class="mega-box">
                                <div class="row">
                                   
                                    <div class="col-lg-3 col-md-6">
                                        <div class="lt-news">

                                    @foreach (App\Models\Category::where('country_id',Session::get('country_id'))->get() as $key => $category)

                                    @if ($key < 12)
                                        
                                    
                                        <a href="{{route('front.category.show',$category->handle)}}">
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
                                    @if (($key + 1)%3 == 0 && ($key + 1) < 12)
                                        </div>
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
                        <li class="list-inline-item cup-btn"><a href="{{route('front.trackorder')}}">{{__('Track Your Order')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>