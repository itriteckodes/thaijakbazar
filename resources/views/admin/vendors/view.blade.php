@extends('layout.admin')

@section('title')
    Name: {{$vendor->name}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        {{-- <a href="{{route('admin.allergy.index')}}"> --}}
            <div class="card card-body bg-blue-400 has-bg-image">
                <div class="media">
                   
                    <div class="media-body">
                        <h3 class="mb-0 txt4">PKR {{$vendor->account->balance}}</h3>
                        <span class="text-uppercase font-size-xs txt4">Balance</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-wallet icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{route('admin.order.index',$vendor->id)}}">
            <div class="card card-body bg-info-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0 txt4">{{$vendor->orders->count()}}</h3>
                        <span class="text-uppercase font-size-xs">Orders</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-bag icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{route('admin.vendorproducts',$vendor->id)}}">
            <div class="card card-body bg-success-400 has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-store icon-3x opacity-75"></i>
                    </div>
                    <div class="media-body text-right">
                        <h3 class="mb-0">{{$vendor->products->count()}}</h3>
                        <span class="text-uppercase font-size-xs">Products</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <div class="card card-body bg-secondary has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-gift icon-3x opacity-75"></i>
                </div>
                <div class="media-body text-right">
                    <h3 class="mb-0 txt4">{{ $vendor->coupans->count() }}</h3>
                    <span class="text-uppercase font-size-xs txt4">Coupons Added</span>
                </div>
            </div>
        </div>
        </a>
    </div>
    <div class="col-md-4">
        <a data-toggle="modal" data-target="#add_modal">
            <div class="card card-body bg-warning has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0"></h3>
                        <span class="text-uppercase font-size-xs txt4">Add Balance</span>
                    </div>
                    <div class="mr-3 align-self-center">
                        <i class="icon-folder-plus4 icon-3x opacity-75"></i>
                    </div>
                    
                </div>
            </div>
        </a> 
    </div>
    <div class="col-md-4">
        <a data-toggle="modal" data-target="#subtract_modal">
            <div class="card card-body bg-danger-400 has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-folder-minus4 icon-3x opacity-75"></i>
                    </div>
                    <div class="media-body text-right">
                        <h3 class="mb-0"></h3>
                        <span class="text-uppercase font-size-xs txt4">Subtract Balance</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-4">
        <a href="{{ route('admin.get-tickets',$vendor->id) }}">
            <div class="card card-body bg-success-400 has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-ticket icon-3x opacity-75"></i>
                    </div>
                    <div class="media-body text-right">
                        <h3 class="mb-0 txt4">{{ $vendor->tickets->count() }}</h3>
                        <span class="text-uppercase font-size-xs txt4">Total Tickets</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class=" l-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title txt4">Personal Details</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"><img src="{{ $vendor->image }}" alt="" height="200px" width="200px"></div>

                    
                <div class="col-md-9">

                    <div class="row">
                        <div class="form-group col-md-6 txt4">
                            <label>Name</label>
                            <input value="{{$vendor->name}}" name="name" type="text" class="form-control txt4" placeholder="Enter Name" readonly>
                        </div>
                        <div class="form-group col-md-6 txt4">
                            <label>Shop Name</label>
                            <input value="{{$vendor->shop_name}}" name="shop_name" type="text" class="form-control txt4" placeholder="Enter Name" readonly>
                        </div>
                        <div class="form-group col-md-6 txt4">
                            <label>Contact No.</label>
                            <input value="{{$vendor->phone}}" name="phone" type="text" class="form-control txt4" placeholder="Enter full name" readonly>
                        </div>
                        <div class="form-group col-md-6 txt4">
                            <label>Email</label>
                            <input value="{{$vendor->email}}" name="email" type="email" class="form-control txt4" placeholder="Enter email" readonly>
                        </div>
                        
                        <div class="form-group col-md-12 txt4">
                            <label>Address</label>
                            <textarea name="" id="" rows="" class="form-control" readonly>{{$vendor->address}}</textarea>
                        </div>
                    </div>
            </div>
            </div>
        </div>
        <!-- /basic layout -->
    </div>
</div>


<div id="add_modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('admin.addbalance')}}" id="updateForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 txt4" id="myModalLabel">Add Balance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <div class="form-group txt4">
                        <label for="name">Amount</label>
                        <input class="form-control txt4" type="text" id="amount" name="balance" placeholder="Enter Amount" required>
                    </div>
                    <div class="form-group txt4">
                        <label for="description">Comment</label>
                        <input class="form-control txt4" type="text" id="description" name="description" placeholder="Enter Comment">
                    </div>
                </div>
                <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect txt4" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light txt4">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="subtract_modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('admin.subbalance')}}" id="updateForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 txt4" id="myModalLabel">Subtract Balance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <div class="form-group txt4">
                        <label for="name">Amount</label>
                        <input class="form-control txt4" type="text" id="amount" name="balance" placeholder="Enter Amount" required>
                    </div>
                    <div class="form-group txt4">
                        <label for="description">Comment</label>
                        <input class="form-control txt4" type="text" id="description" name="description" placeholder="Enter Comment">
                    </div>
                </div>
                <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect txt4" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light txt4">Subtract</button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection