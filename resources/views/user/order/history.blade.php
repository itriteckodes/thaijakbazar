@extends('layout.user')

@section('title')
    {{__('Orders History')}}
@endsection

@section('content')
    <div class="card">

        <table class="table datatable-save-state table-responsive">
            <thead>
                <tr class="txt3">
                    <th>{{__('Order No')}}</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Address')}}</th>
                    <th>{{__('Subtotal')}}</th>
                    <th>{{__('Tax')}}</th>
                    <th>{{__('Discount')}}</th>
                    <th>{{__('Grand Total')}}</th>
                    <th>{{__('Status')}} </th>
                    <th>{{__('Comments')}}</th> 
                    <th>{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                <tr class="txt4">
                    <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->subtotal}}</td>
                    <td>{{$order->tax}}</td>
                    <td>{{$order->discount}}</td>
                    <td>{{$order->grand_total}}</td>
                    <td>
                        
                        @if ($order->status==0)
                            <span class="badge badge-info">{{__('order Pending')}}</span>
                        @elseif($order->status==1)
                        <span class="badge badge-info">{{__('order Accepted')}}</span>

                        @elseif($order->status==2)
                        <span class="badge badge-danger">{{__('order Rejected')}}</span>
                        @elseif($order->status==3)
                        <span class="badge badge-success">{{__('order Dispatched')}}</span>
                        @elseif($order->status==4)
                        <span class="badge badge-success">{{__('order Delivered')}}</span>
                        @elseif($order->status==5)
                        <span class="badge badge-success">{{__('order Ready To Ship')}}</span>
                        @endif
                    </td>
                    <td>{{$order->comment}}</td>
                    <td><a href="{{route('user.order.show',$order->id)}}" class="btn btn-primary txt4">{{__('View')}}</a></td>
                   
                </tr>
                @endforeach
                
               
            </tbody>
        </table>
    </div>


    @endsection
    
