@extends('layout.admin')

@section('title')
    Gateways
@endsection

@section('content')

<div class="card">

    <table class="table datatable-save-state datatable-responsive">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gateways as $key => $gateway)
                <tr class="txt4">
                <td>{{$key+1}}</td>
                <td>{{$gateway->name}}</td>
                <td><img src="{{asset($gateway->image)}}" alt="" height="60px" width="60px"></td>
                <td>
                    @if ($gateway->status == false)
                        <button class="btn btn-sm btn-success txt4">Active</button>
                    @else
                    <button class="btn btn-sm btn-danger txt4">Deactive</button>
                    @endif
                </td>
                <td>
                    <button data-toggle="modal" data-target="#edit_modal" name="{{$gateway->name}}" 
                        id="{{$gateway->id}}" publishable_key="{{$gateway->publishable_key}}" secret_key="{{$gateway->secret_key}}" api_key="{{$gateway->api_key}}" status="{{$gateway->status}}" class="edit-btn btn btn-primary txt4">Edit</button>
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
                        <label for="name">Logo</label>
                        <input class="form-control txt4" type="file" id="image" name="image">
                    </div>
                    <div class="form-group txt4">
                        <label for="name">Api Key</label>
                        <input class="form-control txt4" type="text" id="api_key" name="api_key" placeholder="Api Key">
                    </div> 
                    <div class="form-group txt4">
                        <label for="name">Publishable Key</label>
                        <input class="form-control txt4" type="text" id="publishable_key" name="publishable_key" placeholder="Publishable Key">
                    </div> 
                    <div class="form-group txt4">
                        <label for="name">Secret Key</label>
                        <input class="form-control txt4" type="text" id="secret_key" name="secret_key" placeholder="Secret Key">
                    </div>
                    
                    <div class="form-group txt4">
                        <label for="name">Status</label>
                        <Select class="form-control txt4" name="status" id="status">
                            <option value="0">Active</option>
                            <option value="1">Deactive</option>
                        </Select>
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
            let publishable_key = $(this).attr('publishable_key');
            let secret_key = $(this).attr('secret_key');
            let api_key = $(this).attr('api_key');
            let status = $(this).attr('status');
            $('#name').val(name);
            $('#id').val(id);
            $('#publishable_key').val(publishable_key);
            $('#secret_key').val(secret_key);
            $('#api_key').val(api_key);
            $('#status').val(status);
            $('#updateForm').attr('action','{{route('admin.gateway.update','')}}' +'/'+id);
        });
    });
</script>
@endsection
