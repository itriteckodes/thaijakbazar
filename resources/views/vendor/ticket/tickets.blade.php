@extends('layout.vendor')

@section('title')
    {{__('Generated Ticket')}}
@endsection

@section('content')
<div class="card">

    <table class="table datatable-save-state">
        <thead>
            <tr>
                <th></th>
                <th>{{__('Ticket No')}}</th>
                <th>{{__('Title')}}</th>
                <th>{{__('Ticket')}}</th>
                <th>{{__('Unread')}}</th>
                <th>{{__('Replies')}}</th>
                <th>{{__('')}}</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $key => $ticket)
            <tr>
                <td></td>
                <td>{{$ticket->id}}</td>
                <td>{{$ticket->title}}</td>
                <td>{{$ticket->ticket}}</td>
                <td>
                    @if ($ticket->Replies->where('opponent_read',false)->count() > 0)
                    <a href="{{ route('vendor.ticket.edit', $ticket->id) }}" class="btn btn-info">{{__('Mark Read')}}</a>
                    @else
                        <span class="badge badge-success txt4">{{__('Already Read')}}</span>
                    @endif
                </td>
                <td><a href="{{route('vendor.ticket.show',$ticket->id)}}" class="btn btn-primary">{{__('View Replies')}}</a></td>
                <td></td>
               
            </tr>
            @endforeach
            
           
        </tbody>
    </table>
</div>
@endsection