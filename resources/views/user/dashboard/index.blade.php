@extends('layout.user')
@section('title')
{{__('Dashboard')}}
@endsection
@section('content')
<div class="row">
    <div class="col-md-3">

        <a href="{{route('user.order.index')}}">
            <div class="card card-body bg-info-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0 txt3">{{ App\Models\Order::where('user_id', Auth::user()->id)->count() }}</h3>
                        <span class="text-uppercase font-size-xs txt3">{{__('Total Orders')}}</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-bag  icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">

        <a href="{{route('user.order.create')}}">
            <div class="card card-body bg-success-400 has-bg-image">
                <div class="media">
                    <div class="media-body">

                        <h3 class="mb-0 txt3">
                            {{ App\Models\Order::where('user_id', Auth::user()->id)->where('status',0)->count() }}
                        </h3>
                        <span class="text-uppercase font-size-xs txt3">{{__('Pending')}}</span>

                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-rotate-cw2  icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </a>

    </div>
    <div class="col-md-3">

        <a href="{{route('user.order.processing')}}">
            <div class="card card-body bg-warning-400 has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-rocket  icon-3x opacity-75"></i>

                    </div>
                    <div class="media-body text-right">
                        <h3 class="mb-0 txt3">
                            {{ App\Models\Order::where('user_id', Auth::user()->id)->where('status',1)->count() }}
                        </h3>
                        <span class="text-uppercase font-size-xs txt3">{{__('In Processing')}}</span>

                    </div>


                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{route('user.order.canceled')}}">
        <div class="card card-body bg-danger-400 has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-thumbs-down2  icon-3x opacity-75"></i>

                </div>
                <div class="media-body text-right">
                    <h3 class="mb-0 txt3">
                        {{ App\Models\Order::where('user_id', Auth::user()->id)->where('status',2)->count() }}
                    </h3>
                    <span class="text-uppercase font-size-xs txt3">{{__("Order's Canceled")}}</span>

                </div>


            </div>
        </div>
    </a>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <a href="{{route('user.order.index')}}">
        <div class="card card-body bg-primary-400 has-bg-image">
            <div class="media">
                <div class="media-body">

                    <h3 class="mb-0 txt3">
                        {{ App\Models\Order::where('user_id', Auth::user()->id)->where('status',3)->count() }}</h3>
                    <span class="text-uppercase font-size-xs txt3">{{__("Order's Dispatched")}}</span>

                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-truck  icon-3x opacity-75"></i>

                </div>
            </div>
        </div>
    </a>
    </div>
    <div class="col-md-3">
        <a href="{{route('user.order.index')}}">
        <div class="card card-body bg-info-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0 txt3">
                        {{ App\Models\Order::where('user_id', Auth::user()->id)->where('status',4)->count() }}</h3>
                    <span class="text-uppercase font-size-xs txt3">{{__("Order's Delivered")}}</span>

                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-medal-star icon-3x opacity-75"></i>

                </div>
            </div>
        </div>
    </a>
    </div>
    <div class="col-md-3">

        <a href="{{route('user.profile.index')}}">
        <div class="card card-body bg-success-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0 txt3">
                        {{ Auth::user()->account == null ? '0': Auth::user()->account->balance }}
                    </h3>
                    <span class="text-uppercase font-size-xs txt3">{{__('Balance')}}</span>

                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-rotate-cw2  icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
        </a>

    </div>
    <div class="col-md-3">

        <a href="{{route('user.ticket.index')}}">
        <div class="card card-body bg-danger-400 has-bg-image">
            <div class="media">
                <div class="media-body">

                    <h3 class="mb-0 txt3">

                        {{Auth::user()->tickets->count() }}
                    </h3>
                    <span class="text-uppercase font-size-xs txt3">{{__("Your Total Tickets")}}</span>

                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-drawer-out  icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
        </a>

    </div>
    <div class="col-md-4"></div>
    @if (Auth::user()->approve == 0)
    <div class="col-md-4">
        
        <a href="{{route('user.profile.index')}}">
        <div class="card card-body bg-warning has-bg-image">
            <div class="media">
                <div class="media-body ">
                    <h3 class="mb-0 txt3">{{__('Profile Status')}}</h3>
                    <span class="text-uppercase font-size-xs txt3">{{__('Pending')}}</span>

                </div>
                <div class="mr-3 text-right">
                    <i class="icon-warning icon-3x opacity-75"></i>
                </div>

            </div>
        </div>
        </a>
    </div>
    @elseif(Auth::user()->approve == 1)
    <div class="col-md-4">
        <a href="{{route('user.profile.index')}}">
        <div class="card card-body bg-success has-bg-image">
            <div class="media">
                <div class="media-body ">
                    <h3 class="mb-0 txt3">{{("Profile Status")}}</h3>
                    <span class="text-uppercase font-size-xs txt3">{{('Approved')}}</span>

                </div>
                <div class="mr-3 text-right">
                    <i class="icon-thumbs-up2 icon-3x opacity-75"></i>
                </div>

            </div>
        </div>
        </a>
    </div>
    @else
    <div class="col-md-4">
        <a href="{{route('user.profile.index')}}">
        <div class="card card-body bg-danger has-bg-image">
            <div class="media">
                <div class="media-body ">
                    <h3 class="mb-0 txt3">{{('Account')}}</h3>
                    <span class="text-uppercase font-size-xs txt3">{{__('Rejected')}}</span>

                </div>
                <div class="mr-3 text-right">
                    <i class="icon-cross icon-3x opacity-75"></i>
                </div>

            </div>
        </div>
        </a>
    </div>
    @endif
    <div class="col-md-4"></div>
</div>
@endsection