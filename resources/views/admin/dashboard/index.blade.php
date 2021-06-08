@extends('layout.admin')

@section('title')
Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-2">
        <a href="{{route('admin.order.pending')}}">
            <div class="card card-body bg-warning-400 has-bg-image">
                <div class="media">
                    <div class="media-body ">
                        <h6 class="mb-0 txt3">{{ App\Models\Order::Where('status', 0)->where('country_id', Session::get('country_id'))->count() }}</h6>
                        <span class="font-size-xs txt3">Orders Pending</span>
                    </div>
                        <i class="icon-rotate-cw2  opacity-75"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-2">
        <a href="{{route('admin.order.accepted')}}">
            <div class="card card-body bg-warning-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h6 class="mb-0 txt3">{{ App\Models\Order::where('status',1)->where('country_id', Session::get('country_id'))->count()}}</h6>
                        <span class="font-size-xs txt3">Orders Accepted</span>
                    </div>
                    <i class="icon-thumbs-up2 opacity-75"></i>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-2">
        <a href="{{route('admin.order.rejected')}}">
            <div class="card card-body bg-warning-400 has-bg-image">
                <div class="media">
                        <i class="icon-thumbs-up2 opacity-75"></i>
                    <div class="media-body text-right">
                        <h6 class="mb-0 txt3">{{ App\Models\Order::where('status',2)->where('country_id', Session::get('country_id'))->count()}}</h6>
                        <span class="font-size-xs txt3">Orders Rejected</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-2">
        <a href="{{route('admin.order.ready')}}">
            <div class="card card-body bg-warning-400 has-bg-image">
                <div class="media">
                        <i class="icon-thumbs-up2 opacity-75"></i>
                    <div class="media-body text-right">
                        <h6 class="mb-0">{{ App\Models\Order::where('status',5)->where('country_id', Session::get('country_id'))->count()}}</h6>
                        <span class="font-size-xs">Ready To Ship</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-2">
        <a href="{{route('admin.order.dispatched')}}">
            <div class="card card-body bg-warning-400 has-bg-image">
                <div class="media">
                        <i class="icon-truck opacity-75"></i>
                    <div class="media-body text-right ">
                        <h6 class="mb-0 txt3">{{ App\Models\Order::Where('status', 3)->where('country_id', Session::get('country_id'))->count() }}</h6>
                        <span class="font-size-xs txt3">Orders Dispatched</span>
                    </div>
                   
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-2">
        <a href="{{route('admin.order.delivered')}}">
            <div class="card card-body bg-warning has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h6 class="mb-0 txt3">{{ App\Models\Order::Where('status', 4)->where('country_id', Session::get('country_id'))->count() }}</h6>
                        <span class="font-size-xs txt3">Orders Delivered</span>
                    </div>
                        <i class="icon-medal-star opacity-75"></i>
                </div>
            </div>
        </a>
    </div>

</div>
<div class="row">
    <div class="col-md-2">
        <a href="{{route('admin.user.index')}}">
            <div class="card card-body bg-info-400 has-bg-image">
                <div class="media">
                        <i class="icon-people opacity-75"></i>
                    <div class="media-body text-right">
                        <h6 class="mb-0 txt3">{{ App\Models\User::where('country_id', Session::get('country_id'))->count() }}</h6>
                        <span class="font-size-xs txt3">Total Customers</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-2">
        <a href="{{route('admin.user.index')}}">
            <div class="card card-body bg-info has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h6 class="mb-0 txt3">{{ App\Models\User::where('status',0)->where('country_id', Session::get('country_id'))->count() }}</h6>
                        <span class="font-size-xs txt3" style="font-size: 10px">Active Customers</span>
                    </div>
                    <i class="icon-user opacity-75"></i>
                </div>
            </div>
        </a>
    </div>    
    <div class="col-md-2">
        <a href="{{route('admin.user.index')}}">
            <div class="card card-body bg-info has-bg-image">
                <div class="media">
                        <i class="icon-blocked opacity-75"></i>
                    <div class="media-body text-right">
                        <h6 class="mb-0 txt3">{{ App\Models\User::where('status',1)->where('country_id', Session::get('country_id'))->count() }}</h6>
                        <span class="font-size-xs txt3">Unactive Customers</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <a href="{{route('admin.vendor.index')}}">
            <div class="card card-body bg-success-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h6 class="mb-0 txt3">{{ App\Models\Vendor::where('deleted', false)->where('country_id', Session::get('country_id'))->count() }}</h6>
                        <span class="font-size-xs txt3">Total Vendors</span>
                    </div>
                        <i class="icon-user opacity-75"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-2">
        <a href="{{route('admin.vendor.index')}}">
            <div class="card card-body bg-success has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h6 class="mb-0 txt3">{{ App\Models\Vendor::where('deleted', false)->where('status',0)->where('country_id', Session::get('country_id'))->where('deleted', false)->count() }}</h6>
                        <span class="font-size-xs txt3">Active Vendor</span>
                    </div>
                        <i class="icon-user opacity-75"></i>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-2">
        <a href="{{route('admin.vendor.index')}}">
            <div class="card card-body bg-success has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h6 class="mb-0 txt3">{{ App\Models\Vendor::where('deleted', false)->where('status',1)->where('deleted', false)->count() }}</h6>
                        <span class="font-size-xs txt3">Blocked Vendor</span>
                    </div>
                        <i class="icon-blocked opacity-75"></i>
                </div>
            </div>
        </a>
    </div>

</div>
@endsection