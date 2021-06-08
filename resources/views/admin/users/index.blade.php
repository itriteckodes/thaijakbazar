@extends('layout.admin')

@section('title')
    Users Management
@endsection

@section('content')

<div class="card">

    <table class="table datatable-save-state datatable-responsive">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
                <th>Action</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                @if ($user->id != 1)
                <tr class="txt4">
                    <td>{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>
                        @if ($user->status == false)
                            <span class="badge badge-success txt4" > Unblock</span>
                        @else
                            <span class="badge badge-danger txt4" > Blocked</span> 
                        @endif
                    </td>
                    <td>
                        @if ($user->status == false)
                            <a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-danger txt4">Block</a>
                        @else 
                            <a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-success txt4">Unblock</a>    
                        @endif
                    </td>
                    <td>
                        <button data-toggle="modal" data-target="#edit_modal" name="{{$user->name}}" email="{{$user->email}}" phone="{{$user->phone}}"
                            id="{{$user->id}}" class="edit-btn btn btn-primary txt4">Edit</button>
                    </td>

                    <td><a href="{{route('admin.user.show',$user->id)}}" type="button" class="btn btn-success txt4">View</a></td>
                        
                    <td>                                    
                        <form action="{{route('admin.user.destroy',$user->id)}}" method="POST">
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="icon-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endif
                
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
                    <h5 class="modal-title mt-0 txt4" id="myModalLabel">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <div class="form-group txt4">
                        <label for="name">Name</label>
                        <input class="form-control txt4" type="text" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group txt4">
                        <label for="name">Email</label>
                        <input class="form-control txt4" type="email" id="email" name="email" placeholder="Email" required disabled>
                    </div>
                    <div class="form-group txt4">
                        <label for="name">Phone</label>
                        <input class="form-control txt4" type="number" id="phone" name="phone" placeholder="Phone" required>
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
            $('#updateForm').attr('action','{{route('admin.user.update','')}}' +'/'+id);
        });
    });
</script>
@endsection
