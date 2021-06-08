@extends('layout.vendor')

@section('style')
<style>
    p.form_text1>span {
        display: inline-block;
        min-width: 120px;
    }
</style>
@endsection
  
@section('title')
Orders Details
@endsection

@section('print_button')
    <a onclick="printDiv()" class="btn btn-success text-white pull-right" >Print</a>
@endsection

@section('content')
<div class="card">  

    <table class="table datatable-save-state">
        <thead>
            <tr class="txt4">
                <th>{{__('User Name')}}</th>
                <th>{{__('User Phone')}}</th>
                <th>{{__('Email')}}</th>
                <th>{{__('Address')}}</th>
            </tr>
        </thead>
        <tbody>
            <tr class="txt4">
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
            </tr>
            
           
        </tbody>
    </table>
</div>
<div class="card">

    <table class="table datatable-save-state">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>{{__('Product')}}</th>
                <th>{{__('Qty')}}</th>
                <th>{{__('Price')}}</th>
                <th>{{__('SubTotal')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $key => $item)
            <tr class="txt4">
                <td>{{$key + 1}}</td>
                <td>{{$item->product->name}}</td>
                <td>{{$item->qty}}</td>
                <td>{{$item->product->price}}</td>
                <td>{{$item->product->price * $item->qty}}</td>
            </tr>
            @endforeach


        </tbody>

    </table>

</div>

<div id='DivIdToPrint' class="container d-none">

    <div class="card">

        <div class="card-header">

        </div>

        <div class="card-body">
            <div class="row container">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div style="width: 100%;float:left; border:0.25px solid black">
                        <h6 class="mt-2" style="text-align: center;">{{__('From')}} : {{$order->vendor->shop_name}}</h6>
                        <p style="text-align: center;font-family: sans-serif !important">
                            {{__('Address')}} : {{$order->vendor->address}}<br>
                            {{__('Phone')}} : {{$order->vendor->phone}}<br>
                            {{__('Order')}} # : INV-{{$order->id}}<br>
                            {{__('Customer Name')}} : {{$order->name}}<br>
                        </p>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <p class="mt-4 text-center">-----{{__('Cut Here')}}----- </p>
                
           
            <div class="row container" style="margin-top: 30px !important">
                <div class="col-sm-3">
                    <img src="{{asset('front/images/logo13.png')}}" style="width:95%;height:80px" alt="">
                </div>
                <div class="col-sm-6">

                </div>
                <div class="col-sm-3 mt-4">
                    <div class="row">
                        <div class="col-sm-5">
                            <span>{{__('Date')}} : </span>
                            <span>{{__('Invoice')}}#: </span>
                        </div>
                        <div class="col-sm-7">
                            <span class="myFont">{{$order->created_at->format('d-m-Y')}}</span><br>
                            <span class="myFont">INV-{{$order->id}}</span><br>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="table-responsive-sm">
                <table class="table table-striped table-bordered">
                    <thead class="card-header">
                        <tr>
                            <th class="center">{{__('Sr no')}}</th>
                            <th>{{__('Item')}}</th>

                            <th class="right">{{__('Qty')}}</th>
                            <th class="center">{{__('Unit Cost')}}</th>
                            <th class="right">{{__('Total')}}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($order->items as $key => $item)
                        <tr>
                            <td class="center">{{$key + 1}}</td>
                            <td class="left"> {{$item->product->name}}</td>
                            <td class="right"> {{$item->qty}}</td>
                            <td class="center"> {{$item->product->price}}</td>
                            <td class="right"> {{round($item->qty*$item->product->price)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="card-header">
                        <tr>
                            <th>#</th>
                            <th>{{__('Sub-Total')}}</th>
                            <th class="right">{{$total_qty}}</th>
                            <th class="center">--</th>
                            <th class="right">{{$order->subtotal}}/-</th>
                        </tr>

                        <tr>
                            <th colspan="3" id="hide1"></th>
                            <th>{{__('Tax')}}</th>
                            <th>{{$order->tax}}/-</th>
                        </tr>

                        <tr>
                            <th colspan="3" id="hide1"></th>
                            <th>{{__('Shipping')}}</th>
                            <th class="right">{{$order->shipping}}/-</th>
                        </tr>

                        <tr>
                            <th colspan="3" id="hide1"></th>
                            <th class="center">{{__('Grand Total')}}</th>
                            <th class="right">{{$order->grand_total}}/-</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row container">
                <div class="col-sm-4">

                </div>

                <div class="col-sm-5">

                </div>

                <div class="col-sm-3 text-center">
                    <br>
                    <hr>
                    <h6>{{__('Signature')}}</h6>
                </div>

            </div>

            <p>{{__('This is a system generated sale.Errors and omissions are expected.')}} </p>
            <br>
            <small style="text-align:center">{{__('Printed at')}}: {{Carbon\Carbon::now()}}</small>

            <p class="mt-4 text-center">-----{{__('Cut Here')}}----- </p>

            <div class="row container mt-4">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div style="width: 100%;float:left; border:0.25px solid black">
                    <h6 class="mt-2" style="text-align: center;">{{__('To')}}: {{$order->name}}</h6>
                    <p style="text-align: center;font-family: sans-serif !important" class="txt4">
                        {{__('Address')}} : {{$order->address}}<br>
                        {{__('Phone')}} : {{$order->phone}}<br>
                        {{__('Order')}} # : INV-{{$order->id}}<br>
                    </p>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        </div>

    </div>
</div>


@endsection

@section('scripts')
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script>
    $('#zero-config').DataTable();
</script>

<script>
    function printDiv() {
    
        var divToPrint=document.getElementById('DivIdToPrint');
    
        var newWin=window.open('','Print-Window');
    
        newWin.document.open();
    
        newWin.document.write('<html><head><link rel="stylesheet" href="{{asset('print/bootstrap.min.css')}}"><link rel="stylesheet" href="{{asset('print/style.css')}}"></head><body>'+divToPrint.innerHTML+'</body></html>');
    
    
        setTimeout(function(){
            newWin.print();
            newWin.close();
            // window.history.back();
        },1500);  
    }
</script>
@endsection