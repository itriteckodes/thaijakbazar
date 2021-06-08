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
                        
                        <li class="list-inline-item"><span>||</span> {{__('Wishlist')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb Area -->

<!-- Wishlist -->
<section class="shopping-cart">
    <div class="container">
        <div class="row">
            @if ($wishes->count() > 0)
            <div class="col-md-12">
                <div class="cart-table wsh-list table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="t-pro">{{__('Product')}}</th>
                                <th class="t-price">{{__('Price')}}</th>
                                <th class="t-qty">{{__('Stock')}}</th>
                                <th class="t-total">{{__('Product Details')}}</th>
                                <th class="t-rem"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishes as $wish)
                                <tr>
                                    <td class="t-pro d-flex">
                                        <div class="t-img">
                                            <a href="#"><img src="{{$wish->product->images->first()->image}}" alt="" height="100px" width="100px"></a>
                                        </div>
                                        <div class="t-content">
                                            <p class="t-heading"><a href="#">{{$wish->product->name}}</a></p>
                                            <ul class="list-unstyled list-inline rate">
                                                @for($i=1; $i<=$wish->product->rating; $i++)
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    @endfor
                                                    @for($i=1; $i<=5-$wish->product->rating; $i++)
                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                    @endfor

                                            </ul>
                                            
                                        </div>
                                    </td>
                                    <td class="t-price">{{Session::get('currency_name')}} {{$wish->product->price}}</td>
                                    <td class="t-stk">
                                        @if ($wish->product->stock > 0)
                                            <span>{{__('In Stock')}}</span>
                                        @else 
                                           <span>{{__('Out of Stock')}}</span>
                                        @endif 
                                    </td>
                                    <td class="t-add"><a href="{{route('front.product.show',$wish->product->handle)}}"><button type="button" name="button">{{__('Details')}}</button></a></td>
                                    <td class="t-rem">
                                        <form method="post" action="{{route('user.wishlist.destroy',$wish->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn" type="submit"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                       
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="col-md-12 text-center">
                <h2>{{__('Your Wishlist is Empty')}}</h2>
                <br>
                <a href="{{ route('front.home') }}" class="btn btn-success" style="background-color: #00401A">{{__('Go to Store')}}</a>
            </div>
                
            @endif
            
        </div>
    </div>
</section>

@include('front.includes.partners')

@endsection