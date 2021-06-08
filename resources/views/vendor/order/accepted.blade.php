@extends('layout.vendor')

@section('title')
    Accepted Orders
@endsection

@section('content')
    <div class="card">

        <table class="table datatable-save-state table-responsive">
            <thead>
                <tr class="txt4">
                    <th>#</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Order No')}}</th>
                    <th>{{__('Address')}}</th>
                    <th>{{__('Subtotal')}}</th>
                    <th>{{__('Tax')}}</th>
                    <th>{{__('Discount')}}</th>
                    <th>{{__('Grand Total')}}</th>
                    <th>{{__('Payment Method')}}</th>
                    <th>{{__('Change Status')}}</th>
                    <th>{{__('Comment From Admin')}}</th> 
                    <th>{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                <tr class="txt4">
                    <td>{{$key+1}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->id}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->subtotal}}</td>
                    <td>{{$order->tax}}</td>
                    <td>{{$order->discount}}</td>
                    <td>{{$order->grand_total}}</td>
                    <td>{{$order->gateway->name}}</td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('vendor.order.readyToShip',$order->id)}}"
                                        class="edit-btn dropdown-item edit-btn txt4">
                                        <i class="icon-pencil"></i> {{__('Ready To Ship')}}</a>
                                    <a href="{{route('vendor.order.status.deliver',$order->id)}}" class="edit-btn dropdown-item edit-btn txt4">
                                    <i class="icon-stack"></i> {{__('delivered')}}</a>
                                    
                                    <a href="{{route('vendor.order.status.dispatch',$order->id)}}" class="edit-btn dropdown-item edit-btn txt4">
                                    <i class="icon-pencil"></i> {{__('dispatched')}}</a>
                                    
                                    <a href="{{route('vendor.order.status.reject',$order->id)}}" class="edit-btn dropdown-item edit-btn txt4">
                                    <i class="icon-trash"></i> {{__('rejected')}}</a>
                                </div>
                            </div>
                        </div>  
                    </td>
                    <td>{{$order->comment}}</td> 
                    <td><a href="{{route('vendor.order.details',$order->id)}}" class="btn btn-primary txt4">{{__('View')}}</a></td>
                   
                </tr>
                @endforeach
                
               
            </tbody>
        </table>
    </div>


    @endsection
    
