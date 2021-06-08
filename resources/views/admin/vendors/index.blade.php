@extends('layout.admin')

@section('title')
    Vendors Management
@endsection

@section('content')

<div class="card">

    <table class="table datatable-save-state datatable-responsive">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>Name</th>
                <th>Shop Name</th>
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
            @foreach ($vendors as $key => $vendor)
                <tr class="txt4">
                <td>{{$key+1}}</td>
                <td>{{$vendor->name}}</td>
                <td>{{$vendor->shop_name}}</td>
                <td>{{$vendor->email}}</td>
                <td>{{$vendor->phone}}</td>
                <td>
                    @if ($vendor->status == false)
                        <span class="badge badge-success txt4"> Unblocked</span>
                    @else
                        <span class="badge badge-danger txt4"> Blocked</span>
                    @endif
                </td>
                <td>
                    @if ($vendor->status == false)
                        <a href="{{route('admin.vendor.edit',$vendor->id)}}" class="btn btn-danger txt4">Block</a>
                    @else 
                        <a href="{{route('admin.vendor.edit',$vendor->id)}}" class="btn btn-success txt4">Unblock</a>    
                    @endif
                </td>
                <td>
                    <button data-toggle="modal" data-target="#edit_modal" name="{{$vendor->name}}" email="{{$vendor->email}}" phone="{{$vendor->phone}}"
                        id="{{$vendor->id}}" description="{{$vendor->description}}"
                        shop_name="{{$vendor->shop_name}}" class="edit-btn btn btn-primary txt4">Edit</button>
                </td>
                <td><a href="{{route('admin.vendor.show',$vendor->id)}}" type="button" class="btn btn-success txt4">View</a></td>
                <td>    
                    @if($vendor->deleted == false)                                
                    <form action="{{route('admin.vendor.destroy',$vendor->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="icon-trash"></i> Delete</button>
                    </form>
                    @else
                    <span class="badge badge-danger">Deleted</span>
                    @endif
                </td>
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
                        <label for="name">Shop Name</label>
                        <input class="form-control txt4" type="text" id="shop_name" name="shop_name" placeholder="Shop Name" required>
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
            let shop_name = $(this).attr('shop_name');
            let id = $(this).attr('id');
            let email = $(this).attr('email');
            let phone = $(this).attr('phone');
            $('#name').val(name);
            $('#shop_name').val(shop_name);
            $('#id').val(id);
            $('#email').val(email);
            $('#phone').val(phone);
            $('#updateForm').attr('action','{{route('admin.vendor.update','')}}' +'/'+id);
        });
    });
</script>
@endsection
