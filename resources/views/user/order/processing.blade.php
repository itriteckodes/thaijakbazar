@extends('layout.user')

@section('title')
    {{__('Processing Orders')}}
@endsection

@section('content')
    <div class="card">

        <table class="table datatable-save-state table-responsive">
            <thead>
                <tr class="txt4">
                    <th>#</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Address')}}</th>
                    <th>{{__('Subtotal')}}</th>
                    <th>{{__('Tax')}}</th>
                    <th>{{__('Discount')}}</th>
                    <th>{{__('Grand Total')}}</th>
                    <th>{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                <tr class="txt4">
                    <td>{{$key+1}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->subtotal}}</td>
                    <td>{{$order->tax}}</td>
                    <td>{{$order->discount}}</td>
                    <td>{{$order->grand_total}}</td>
                    <td><a href="{{route('user.order.show',$order->id)}}" class="btn btn-primary txt4">{{__('View')}}</a></td>
                   
                </tr>
                @endforeach
                
               
            </tbody>
        </table>
    </div>


    @endsection
    
