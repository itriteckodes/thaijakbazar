
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
                <th>Status</th>
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
                    <td>
                        <p><span class="badge badge-success">Read</span></p>
                    </td>
                    <td>
                        <button data-toggle="modal" data-target="#delete_modal" id="{{$message->id}}"`
                            class="btn btn-danger delete-btn txt4"> Delete</button>
                    </td>
                        
                        
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



<div id="delete_modal" class="modal fade">
    <div class="modal-dialog modal-xs">
        <form id="deleteForm" method="POST" enctype="multipart/form-data">
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title mt-0 txt4" id="myModalLabel">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="" class="txt4">Are you sure you want to delete ?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect waves-light txt4">Delete</button>
                    <button type="button" class="btn btn-primary waves-effect txt4" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
      

        $('body').on('click', '.delete-btn', function(){
                let id = $(this).attr('id');
                $('#id').val(id);
                $('#deleteForm').attr('action','{{route('admin.contact.destroy','')}}' +'/'+id);
            });
    });
</script>
@endsection


