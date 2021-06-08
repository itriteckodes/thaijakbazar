
@extends('layout.admin')

@section('title')
Contact Messages
@endsection

@section('content')
<div class="card">

    <table class="table datatable-save-state datatable-responsive">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $key => $message)
                <tr class="txt4">
                    <td>{{$key+1}}</td>
                    <td>{{$message->name}}</td>
                    <td><a href="mailto:{{$message->email}}">{{$message->email}}</a></td>
                    <td>{{$message->subject}}</td>
                    <td>{{$message->message}}</td>
                    <td><a href="{{route('admin.contact.edit',$message->id)}}" class="btn btn-primary txt4">Mark Read</a></td>
                        
                        
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection


