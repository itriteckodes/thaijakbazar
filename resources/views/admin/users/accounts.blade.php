@extends('layout.admin')

@section('title')
    Accounts
@endsection
@section('content')
<div class="card">

    <table class="table datatable-save-state">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>Title</th>
                <th>Acount No.</th>
                <th>Method</th>
                <th>Identity</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $key => $request)
                <tr class="txt4">
                <td>{{$key+1}}</td>
                <td>{{$request->title}}</td>
                <td>{{$request->account_no}}</td>
                <td>{{$request->withdrawMethod->name}}</td>
                <td><a href="{{asset($request->image)}}" target="_blank"><img src="{{asset($request->image)}}" alt="" height="100px" width="100px"></a></td>
                <td>{{$request->description}}</td>
                <td>
                    @if ($request->status == 1)
                    <span class="badge badge-success txt4">Approved</span> 
                @elseif($request->status == 2)
                    <span class="badge badge-danger txt4"> Rejected </span>
                @else
                    Pending
                @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

