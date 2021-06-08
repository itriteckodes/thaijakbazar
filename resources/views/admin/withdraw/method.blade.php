@extends('layout.admin')

@section('title')
    Withdraw
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title txt4">Add Withdraw Method</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.withdrawmethod.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 txt4">
                            <label>Name</label>
                            <input  name="name" type="text" class="form-control txt4" placeholder="Enter full name" required>
                        </div>

                        <div class="form-group col-md-6 txt4">
                            <label>Image</label>
                            <input  name="image" type="file" class="form-control txt4" required>
                        </div>

                        <div class="text-right col-md-12">
                            <button type="submit" class=" btn btn-primary txt4">Add<i class="icon-plus22 ml-2"></i>
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

    <table class="table datatable-save-state">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Delete</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($methods as $key => $method)
            <tr class="txt4">
                <td></td>
                <td>{{$key + 1}}</td>
                <td>{{$method->name}}</td>
                
                <td><img src="{{$method->image}}" alt="{{$method->name}}" height="50px" width="60px"></td>
                
               
                <td>
                    <button data-toggle="modal" data-target="#delete_modal" id="{{$method->id}}"`
                        class="btn btn-danger delete-btn txt4"> Delete</button>
                </td>
                <td></td>
               
               
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
                $('#deleteForm').attr('action','{{route('admin.withdrawmethod.destroy','')}}' +'/'+id);
            });
    });
</script>
@endsection