@extends('layout.admin')

@section('title')
    Generated Ticket
@endsection

@section('content')
<div class="card">

    <table class="table datatable-save-state table-responsive">
        <thead>
            <tr class="txt4">
                <th></th>
                <th>Ticket no</th>
                <th>Type</th>
                <th>Ticket</th>
                <th>Name</th>
                <th>Status</th>
                <th>Replies</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $key => $ticket)
            <tr class="txt4">
                <td></td>
                <td>{{$ticket->id}}</td>
                <td>{{$ticket->type}}</td>
                <td>{{$ticket->ticket}}</td>
                
                <td>
                    @if ($ticket->user_id != null)
                        {{$ticket->user->name}}
                    @elseif($ticket->vendor_id != null)
                        {{$ticket->vendor->name}}
                    @elseif($ticket->hotel_id != null)
                        Gojak Restaurant
                    @endif
                </td>
                <td>
                    @if ($ticket->Replies->where('admin_read',false)->count() > 0)
                        <a href="{{ route('admin.ticket.edit', $ticket->id) }}" class="btn btn-info">Mark Read</a>
                    @else
                        <span class="badge badge-success txt4">Already Read</span>
                    @endif
                </td>
                <td><a href="{{route('admin.ticket.show',$ticket->id)}}" class="btn btn-primary txt4">View Replies</a></td>
                <td></td>
               
            </tr>
            @endforeach
            
           
        </tbody>
    </table>
</div>
@endsection