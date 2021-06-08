@extends('layout.admin')

@section('title')
    Subcategories
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title txt4">Add Subcategory</h5>
            </div>

            <div class="card-body">
                <form action="{{route('admin.subcategory.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 txt4">
                            <label>Select Category</label>
                            <select name="cat_id" id="cat_id" class="form-control txt4" required>
                                @foreach(App\Models\Category::where('country_id',Session::get('country_id'))->get() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6 txt4">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control txt4" placeholder="Subcategory name" required>
                        </div>
                        <input type="hidden" name="country_id" value="{{Session::get('country_id')}}" required>

                        <div class="text-right col-md-2 txt4">
                            <label class="text-white txt4">Create</label>
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
                <th>Main Category</th>
                <th>Action</th>
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $key => $subcategory)
                <tr class="txt4">
                <td>{{$key+1}}</td>
                <td>{{$subcategory->name}}</td>
                <td>{{$subcategory->category->name}}</td>
                <td>
                    <button data-toggle="modal" data-target="#edit_modal" name="{{$subcategory->name}}" cat_id="{{$subcategory->cat_id}}"
                        id="{{$subcategory->id}}" class="edit-btn btn btn-primary txt4">Edit</button>
                </td>
                <td>
                    <button data-toggle="modal" data-target="#delete_modal" id="{{$subcategory->id}}"`
                        class="btn btn-danger delete-btn txt4"> Delete</button>
                </td>
                <td></td>
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
                    <h5 class="modal-title mt-0 txt4" id="myModalLabel">Update Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <div class="form-group txt4">
                        <label class="txt4">Select Category</label>
                        <select name="cat_id" id="category_id" class="form-control txt4" required>
                            <option selected disabled>Select Category</option>
                            @foreach(App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group txt4">
                        <label for="name" class="txt4">Name</label>
                        <input class="form-control txt4" type="text" id="name" name="name" placeholder="Subcategory Name" required>
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
            let cat_id = $(this).attr('cat_id');
            $('#name').val(name);
            $('#id').val(id);
            $('#category_id').val(cat_id);
            $('#updateForm').attr('action','{{route('admin.subcategory.update','')}}' +'/'+id);
        });

        $('body').on('click', '.delete-btn', function(){
                let id = $(this).attr('id');
                $('#id').val(id);
                $('#deleteForm').attr('action','{{route('admin.subcategory.destroy','')}}' +'/'+id);
            });
    });
</script>
@endsection
