@extends('layout.admin')

@section('title')
    Coupons
@endsection

@section('content')

<div class="card">

    <table class="table datatable-save-state datatable-responsive">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>Vendor</th>
                <th>Name</th>
                <th>Code</th>
                <th>Rate %</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coupons as $key => $coupon)
                <tr class="txt4">
                <td>{{$key+1}}</td>
                <td>{{$coupon->vendor->name}}</td>
                <td>{{$coupon->name}}</td>
                <td>{{$coupon->code}}</td>
                <td>{{$coupon->rate}} %</td>
                
                
                <td>
                    <button data-toggle="modal" data-target="#edit_modal" name="{{$coupon->name}}"
                        id="{{$coupon->id}}" code="{{$coupon->code}}" rate="{{$coupon->rate}}" class="edit-btn btn btn-primary txt4">Edit</button>
                </td>
                <td>
                    <button data-toggle="modal" data-target="#delete_modal" id="{{$coupon->id}}"`
                        class="btn btn-danger delete-btn txt4"> Delete</button>
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
                    <h5 class="modal-title mt-0 txt4" id="myModalLabel">Update coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                  

                    <div class="form-group txt4">
                        <label for="name">Name</label>
                        <input class="form-control txt4" type="text" id="name" name="name" placeholder="coupon Name" required>
                    </div>
                    <div class="form-group txt4">
                        <label for="name">Code</label>
                        <input  class="form-control txt4" name="code" type="text" id="code" required>
                    </div> 
                    <div class="form-group txt4">
                        <label for="name">Rate %</label>
                        <input  class="form-control txt4" name="rate" type="text" id="rate"  required>
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
            let code = $(this).attr('code');
            let rate = $(this).attr('rate');
            $('#name').val(name);
            $('#code').val(code);
            $('#rate').val(rate);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.coupon.update','')}}' +'/'+id);
        });

        $('body').on('click', '.delete-btn', function(){
                let id = $(this).attr('id');
                $('#id').val(id);
                $('#deleteForm').attr('action','{{route('admin.coupon.destroy','')}}' +'/'+id);
            });
    });
</script>
@endsection
