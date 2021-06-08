@extends('layout.admin')

@section('title')
        Orders History
@endsection

@section('content')
    <div class="card">

        <table class="table datatable-save-state table-responsive">
            <thead>
                <tr class="txt4">
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Subtotal</th>
                    <th>Tax</th>
                    <th>Discount</th>
                    <th>Grand Total</th>
                    <th>Vendor</th>
                    <th>Action</th>
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
                    <td>{{$order->vendor->name}}</td>
                    <td><a href="{{route('admin.order.details',$order->id)}}" class="btn btn-primary txt4">View</a></td>
                   
                </tr>
                @endforeach
                
               
            </tbody>
        </table>
    </div>
    


    @endsection
    
