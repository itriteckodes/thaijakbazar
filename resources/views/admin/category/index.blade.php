@extends('layout.admin')

@section('title')
    Category
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title txt4">Add Category</h5>
            </div>

            <div class="card-body">
                <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label class="txt4">Name</label>
                            <input name="name" type="text" class="form-control txt4" placeholder="Category name" required>
                        </div>
                        <div class="form-group col-md-4 txt4">
                            <label for="name" class="txt4">Category Picture</label>
                            <input name="image" type="file" class="form-input-styled txt4 " data-fouc required>
                        </div>
                        <div class="form-group col-md-4 txt4">
                            <label for="name" class="txt4">Category Picture (Mobile)</label>
                            <input name="mobileimage" type="file" class="form-input-styled txt4 " data-fouc required>
                        </div>

                        <input type="hidden" name="country_id" value="{{Session::get('country_id')}}" required>
                        <div class="text-right col-md-2">
                            <label class="text-white">Create</label>
                            <button type="submit" class="form-control btn btn-primary txt4">Create
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
                <th>Image</th>
                <th>Mobile Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
                <tr class="txt4">
                <td>{{$key+1}}</td>
                <td>{{$category->name}}</td>
                <td><img src="{{$category->image}}" alt="{{$category->name}}" height="20px" width="20px"></td>
                <td><img src="{{$category->mobileimage}}" alt="{{$category->name}}" height="20px" width="20px"></td>
                <td>
                    <button data-toggle="modal" data-target="#edit_modal" name="{{$category->name}}"
                        id="{{$category->id}}" class="edit-btn btn btn-primary txt4">Edit</button>
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
                    <h5 class="modal-title mt-0 txt4" id="myModalLabel">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                  

                    <div class="form-group">
                        <label for="name" class="txt4">Name</label>
                        <input class="form-control txt4" type="text" id="name" name="name" placeholder="Category Name" required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="txt4">Category Picture</label>
                        <input name="image" type="file" class="form-input-styled txt4" data-fouc>
                    </div>
                    <div class="form-group">
                        <label for="name" class="txt4">Category Picture (Mobile)</label>
                        <input name="mobileimage" type="file" class="form-input-styled txt4" data-fouc>
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
        $('body').on('click', '.edit-btn', function(){
            let name = this.name;
            let id = $(this).attr('id');
            $('#name').val(name);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.category.update','')}}' +'/'+id);
        });

        $('body').on('click', '.delete-btn', function(){
                let id = $(this).attr('id');
                $('#id').val(id);
                $('#deleteForm').attr('action','{{route('admin.category.destroy','')}}' +'/'+id);
            });
    });
</script>
@endsection
