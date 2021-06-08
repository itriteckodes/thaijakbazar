@extends('layout.admin')

@section('title')
{{$product->name}}

@endsection

@section('content')
    <div class="card">

        <table class="table datatable-save-state table-responsive">
            <thead>
                <tr class="txt4">
                    <th>#</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="txt4">
                @foreach ($product->images as $key => $product_image)
                <tr>
                    <td>{{$key+1}}</td>
                    <td><img src="{{$product_image->image}}"  height="80px" width="80px" alt=""></td>
                    <td><a  data-toggle="modal" data-target="#edit_image" product_id="{{$product_image->id}}" class="btn btn-primary edit-btn text-white txt4">Edit</a></td>
                    @if ($product->images->count()>1)
                    <td> <form action="{{route('admin.image.destroy',$product_image->id)}}" method="POST">
                        @method('DELETE')
                        <button type="submit" class=" btn btn-danger txt4"><i class="icon-trash"></i> Delete</button>
                    </form></td>
                    @endif
                </tr>
                @endforeach
                
               
            </tbody>
        </table>
    </div>
    <div id="edit_image" class="modal fade">
        <div class="modal-dialog">
            <form id="updateForm" method="POST" enctype="multipart/form-data">
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0 txt4" id="myModalLabel">Update Product</h5>
                        <button type="button" class="close txt4" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputFile" class="txt4">Image</label>
                            <div class="input-group">
                              <div class="custom-file">                
                                <input type="file" name="image" class="custom-file-input txt4" id="exampleInputFile" required>
                                <label class="custom-file-label txt4" for="exampleInputFile">Choose file</label>
                              </div>
                             
                            </div>
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
            $('.edit-btn').click(function(){
                let id = $(this).attr('product_id');
                $('#updateForm').attr('action','{{route('admin.image.update','')}}' +'/'+id);
            });
        });
    </script>
    @endsection