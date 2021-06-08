@extends('layout.admin')

@section('title')
    Edit Admin
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">

        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Edit Admin</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.admins.update',$admin->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    <div class="form-group txt4">
                        <label for="name">Name</label>
                        <input class="form-control txt4" type="text" id="name" name="name" placeholder="Name" value="{{$admin->name}}" required>
                    </div>
                    <div class="form-group txt4">
                        <label for="name">Email</label>
                        <input class="form-control txt4" type="text" id="email" name="email" placeholder="Email" value="{{$admin->email}}" required>
                    </div>
                    <div class="form-group txt4">
                        <label for="name">Password <small>(Leave Blank to keep original)</small></label>
                        <input class="form-control txt4" type="text" id="password" name="password" placeholder="password">
                       
                    </div>

                    <div class="form-group">
                        <label>Roles</label>
                        <select id="allergies" name="roles[]" multiple class="form-control select" required data-fouc>
                            @foreach ($roles as $role)
                            <option {{$admin->HasRole($role->id)?'selected':''}} value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#allergies').select2();
        });
    </script>
@endsection