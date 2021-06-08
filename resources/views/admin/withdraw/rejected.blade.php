@extends('layout.admin')

@section('title')
   Rejected Withdraws
@endsection

@section('content')
<div class="card">

    <table class="table datatable-save-state table-responsive">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>Title</th>
                <th>Account No.</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Type</th>
                <th>Status</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $key => $request)
            <tr class="txt4">
                <td>{{$key+1}}</td>
                <td>{{$request->withdrawAccount->title}}</td>
                <td>{{$request->withdrawAccount->account_no}}</td>
                <td>{{$request->amount}}</td>
                <td>{{$request->withdrawAccount->withdrawMethod->name}}</td>
                
                <td>
                    @if ($request->user_id == null)
                        Vendor
                    @else 
                        User
                    @endif
                </td>
                <td>
                    @if($request->status == 2)
                        <span class="badge badge-danger txt4"> Rejected </span> 
                    @endif
                </td>
                
               
            </tr>
            @endforeach
            
           
        </tbody>
    </table>
</div>
@endsection