@extends('layout.admin')

@section('title')
    Add Banner
@endsection

@section('content')
  
    <div class="row">
        <div class="col-md-12">
            <!-- Basic layout-->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title txt4">Add Banner</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.banner.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="form-group col-md-4 txt4">
                                <label>Select Product</label>
                                <select  name="product_id" type="text" class="form-control txt4" required>
                                    @foreach (App\Models\Product::all() as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4 txt4">
                                <label for="name">Image</label>
                                <input name="image" type="file" class="form-input-styled txt4" data-fouc required>
                            </div>

                            <div class="form-group col-md-4 txt4">
                                <label>End time</label>
                                <input name="end_time" type="datetime-local" class="form-control txt4" required>
                            </div>

                            <div class="text-right col-md-12">
                                <button type="submit" class="btn btn-primary txt4">Add
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
                    <th>Image</th>
                    <th>Product</th>
                    <th>End Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $key => $banner)

                  
                    <tr class="txt4">
                        <td>{{$key+1}}</td>
                        <td><img src="{{$banner->image}}" alt="" height="100px" width="100px"></td>
                        <td>{{$banner->product->name}}</td>
                        <td>{{$banner->end_time->format('d-m-y h:i:s')}}</td>
                       
                        <td>
                            <button data-toggle="modal" data-target="#delete_modal" id="{{$banner->id}}" class="btn btn-danger delete-btn txt4"> Delete</button>
                        </td>
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
               
                $('#deleteForm').attr('action','{{route('admin.banner.destroy','')}}' +'/'+id);
            });
    });
</script>
@endsection

