@extends('layout.admin')

@section('title')
    Add Admin
@endsection

@section('content')
  
    <div class="row">
        <div class="col-md-12">
            <!-- Basic layout-->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title txt4">Enter Information</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.admins.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="form-group col-md-6 txt4">
                                <label>Name</label>
                                <input  name="name" type="text" class="form-control txt4" placeholder="Enter full name" required>
                            </div>

                            <div class="form-group col-md-6 txt4">
                                <label>Email</label>
                                <input  name="email" type="email" class="form-control txt4" placeholder="Enter email" required>
                            </div>

                            <div class="form-group col-md-6 txt4">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control txt4" placeholder="Enter password" required>
                            </div>
                            <div class="form-group col-md-6 txt4">
                                <label>Roles</label>
                                <select name="roles[]" multiple class="form-control select" required>
                                    @foreach (App\Models\Role::all() as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-right col-md-12">
                                <button type="submit" class=" btn btn-primary txt4">Add New Admin
                                    <i class="icon-plus22 ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /basic layout -->
        </div>
    </div>

    <div class="card">

        <table class="table datatable-save-state datatable-responsive">
            <thead>
                <tr class="txt4">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $key => $admin)

                    @if ($admin->id != Auth::user()->id)
                    <tr class="txt4">
                        <td>{{$key+1}}</td>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>
                            <a href="{{route('admin.admins.edit',$admin->id)}}" class="btn btn-primary txt4">Edit</a>
                        </td>
                        <td>
                            <button data-toggle="modal" data-target="#delete_modal" id="{{$admin->id}}"`
                                class="btn btn-danger delete-btn txt4"> Delete</button>
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
                        <h5 class="modal-title mt-0 txt4" id="myModalLabel">Update Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
    
                        <div class="form-group txt4">
                            <label for="name">Name</label>
                            <input class="form-control txt4" type="text" id="name" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group txt4">
                            <label for="name">Email</label>
                            <input class="form-control txt4" type="text" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group txt4">
                            <label for="name">Password <small>(Leave Blank to keep original)</small></label>
                            <input class="form-control txt4" type="text" id="password" name="password" placeholder="password">
                           
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
    
    <div id="delete_modal" class="modal fade">
        <div class="modal-dialog modal-xs">
            <form id="deleteForm" method="POST" enctype="multipart/form-data">
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title mt-0" id="myModalLabel">Warning</h5>
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
        $('body').on('click', '.edit-btn', function(){
            let name = this.name;
            let id = $(this).attr('id');
            let email = $(this).attr('email');
            $('#name').val(name);
            $('#email').val(email);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.admins.update','')}}' +'/'+id);
        });

        $('body').on('click', '.delete-btn', function(){
                let id = $(this).attr('id');
                $('#id').val(id);
                $('#deleteForm').attr('action','{{route('admin.admins.destroy','')}}' +'/'+id);
            });
    });
</script>
@endsection

