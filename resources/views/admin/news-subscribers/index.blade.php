@extends('layout.admin')
@section('title')
   News Letter Box
@endsection
@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title txt4">Send Email to Subscribers</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
        

        <form class="form-validate-jquery" action="{{route('admin.sendnewsletter')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
               
                <div class="form-group col-md-6 txt4">
                    <label for="st_cnic">Subject</label>
                    <input type="text" class="form-control txt4" name="subject" value="" id="st_cnic" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 txt4">
                    <label for="password">Message</label>
                    <textarea rows="4" class="form-control txt4" name="message" id="message" required></textarea>
                    
                </div>
                
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary txt4">Submit <i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>
    </div>
</div>
{{-- ALL SUBSCRIBERS --}}

<div class="row">
    <div class="col-md-3"></div>
    <div class="card col-md-6">

    <table class="table datatable-save-state datatable-responsive col-md-6">
        <thead>
            <tr class="txt4">
                <th></th>
                <th></th>
                <th>#</th>
                <th>Email</th>
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($subscribers as $key => $subscriber)
                <tr class="txt4">
                <td></td>
                <td></td>
                <td>{{$key+1}}</td>
                <td>{{$subscriber->email}}</td>
                <td></td>
                <td></td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="col-md-3"></div>

</div>
@endsection