@extends('layout.admin')

@section('title')
    {{ $vendor->name }} Tickets
@endsection

@section('content')

<div class="card">

    <table class="table datatable-save-state datatable-responsive">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>Name</th>
                <th>Ticket</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $key => $ticket)
                <tr class="txt4">
                <td>{{$key+1}}</td>
                <td>{{$vendor->name}}</td>
                <td>{{$ticket->ticket}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <div class="form-group txt4">
                        <label for="name">Name</label>
                        <input class="form-control txt4" type="text" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group txt4">
                        <label for="name">Email</label>
                        <input class="form-control txt4" type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group txt4">
                        <label for="name">Phone</label>
                        <input class="form-control txt4" type="number" id="phone" name="phone" placeholder="Phone" required>
                    </div> 
                    <div class="form-group txt4">
                        <label for="name">Description</label>
                        <textarea class="form-control txt4" name="description" id="description" ></textarea>
                        {{-- <input class="form-control" type="number" id="phone" name="phone" placeholder="Phone" required> --}}
                    </div> 
                    <div class="form-group txt4">
                        <label for="name">Password</label>
                        <input class="form-control txt4" type="password" id="pass" name="password">
                        <label for="pass">(Leave Blank If You Dont want to Changed Password)</label>
                    </div>
                  

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect txt4" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light txt4">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('body').on('click', '.edit-btn', function(){
            let name = this.name;
            let id = $(this).attr('id');
            let email = $(this).attr('email');
            let phone = $(this).attr('phone');
            $('#name').val(name);
            $('#id').val(id);
            $('#email').val(email);
            $('#phone').val(phone);
            $('#updateForm').attr('action','{{route('admin.ticket.update','')}}' +'/'+id);
        });
    });
</script>
@endsection
