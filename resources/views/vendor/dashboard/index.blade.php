@extends('layout.vendor')

@section('content')
<div class="row">
    <div class="alert alert-info col-md-12" role="alert">
        <marquee>
            <span style="font-family: arial; font-size: 16pt">{{ App\Models\NewsTicker::find(1)->news }}</span>
        </marquee>
    </div>
    </div>
<div class="row">
    <div class="col-md-2">
        <a href="{{route('vendor.order.pending')}}">
            <div class="card card-body bg-warning has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h6 class="mb-0 txt3">{{ Auth::user()->pendingorders->count() }}</h6>
                        <span class="font-size-xs txt3">{{__('Pending Orders')}}</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-rotate-cw2 opacity-75"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-2">
        <a href="{{route('vendor.order.accepted')}}">
            <div class="card card-body bg-warning has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h6 class="mb-0 txt3">{{ Auth::user()->acceptedorders->count() }}</h6>
                        <span class="font-size-xs txt3">{{__('Accepted')}}</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-thumbs-up2 opacity-75"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-2">
        <a href="{{route('vendor.order.rejected')}}">
            <div class="card card-body bg-warning-400 has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-thumbs-down2 opacity-75"></i>
                    </div>
                    <div class="media-body text-right">
                        <h6 class="mb-0 txt3">{{ Auth::user()->rejectedorders->count() }}</h6>
                        <span class="font-size-xs txt3">{{__('Rejected')}}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-2">
        <a href="{{route('vendor.order.ready')}}">
            <div class="card card-body bg-warning-400 has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-thumbs-down2 opacity-75"></i>
                    </div>
                    <div class="media-body text-right">
                        <h6 class="mb-0 txt3">{{ Auth::user()->readyToShip->count() }}</h6>
                        <span class="font-size-xs txt3">{{__('Ready to Ship')}}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-2">
        <a href="{{route('vendor.order.dispatched')}}">
            <div class="card card-body bg-warning has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-truck opacity-75"></i>
                    </div>
                    <div class="media-body text-right">
                        <h6 class="mb-0 txt3">{{ Auth::user()->dispatchedorders->count() }}</h6>
                        <span class="font-size-xs txt3">{{__('Dispatched')}}</span>
                    </div>


                </div>
            </div>
        </a>
    </div>

    <div class="col-md-2">
        <a href="{{route('vendor.order.dispatched')}}">
            <div class="card card-body bg-warning has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-truck opacity-75"></i>
                    </div>
                    <div class="media-body text-right">
                        <h6 class="mb-0 txt3">{{ Auth::user()->deliveredorders->count() }}</h6>
                        <span class="font-size-xs txt3">{{__('Delivered')}}</span>
                    </div>


                </div>
            </div>
        </a>
    </div>


</div>
<div class="row">
    <div class="col-md-2">
        <a href="{{route('vendor.withdraw.newRequest')}}">
            <div class="card card-body bg-success-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h6 class="mb-0 txt3">{{ Auth::user()->account == null ? '0': Auth::user()->account->balance }}</h6>
                        <span class="font-size-xs txt3">{{__('Balance')}}</span>
                    </div>
                    <div class="ml-3 align-self-center">
                        <i class="icon-wallet  opacity-75"></i>

                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-2">
            <div class="card card-body bg-success-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h6 class="mb-0 txt3">{{ App\Values\SetValue::CompanyCommission() }} %</h6>
                        <span class="font-size-xs txt3">{{__('Company')}} %</span>

                    </div>
                        <i class="icon-cash2 opacity-75"></i>
                </div>
            </div>
    </div>
</div>
<div class="row">
    @if (Auth::user()->approve == 0)
    <div class="col-md-2">
        <div class="card card-body bg-warning has-bg-image">
            <div class="media">
                <div class="media-body ">
                    <h6 class="mb-0 txt3">{{__('Profile Status')}}</h6>
                    <span class="font-size-xs txt3">Pending</span>

                </div>
                    <i class="icon-warning opacity-75"></i>
            </div>
        </div>
        </a>
    </div>
    @elseif(Auth::user()->approve == 1)
    <div class="col-md-2">
        <div class="card card-body bg-success has-bg-image">
            <div class="media">
                <div class="media-body ">
                    <h6 class="mb-0 txt3">Profile Status</h6>
                    <span class="font-size-xs txt3">{{__('Approved')}}</span>

                </div>
                    <i class="icon-thumbs-up2 opacity-75"></i>
            </div>
        </div>
        </a>
    </div>
    @else
    <div class="col-md-2">
        <div class="card card-body bg-danger has-bg-image">
            <div class="media">
                <div class="media-body ">
                    <h6 class="mb-0 txt3">{{__('Account')}}</h6>
                    <span class="font-size-xs txt3">{{__('Rejected')}}</span>

                </div>
                    <i class="icon-cross opacity-75"></i>
            </div>
        </div>
        </a>
    </div>
    @endif
</div>
@endsection