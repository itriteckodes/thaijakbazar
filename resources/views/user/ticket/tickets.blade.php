@extends('layout.user')

@section('title')
    {{__('Generated Ticket')}}
@endsection

@section('content')
<div class="card">

    <table class="table datatable-save-state table-responsive">
        <thead>
            <tr>
                <th></th>
                <th>{{__('Ticket No')}}</th>
                <th>{{__('Ticket')}}</th>
                <th>{{__('Status')}}</th>
                <th>{{__('Replies')}}</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $key => $ticket)
            <tr>
                <td></td>
                <td>{{$ticket->id}}</td>
                <td>{{$ticket->ticket}}</td>
                <td>
                    @if ($ticket->Replies->where('opponent_read',false)->count() > 0)
                        <a href="{{ route('user.ticket.edit', $ticket->id) }}" class="btn btn-info">{{__('Mark Read')}}</a>
                    @else
                        <span class="badge badge-success txt4">{{__('Already Read')}}</span>
                    @endif
                </td>
                <td><a href="{{route('user.ticket.show',$ticket->id)}}" class="btn btn-primary">{{__('View Replies')}}</a></td>
                <td></td>
               
            </tr>
            @endforeach
            
           
        </tbody>
    </table>
</div>
@endsection