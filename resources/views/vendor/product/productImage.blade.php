@extends('layout.vendor')

@section('title')
{{$product->name}}
@endsection

@section('content')
    <div class="card">

        <table class="table datatable-save-state table-responsive">
            <thead>
                <tr class="txt4">
                    <th>#</th>
                    <th>{{__('Image')}}</th>
                    <th>{{__('Action')}}</th>
                    <th>{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product->images as $key => $product_image)
                <tr class="txt4">
                    <td>{{$key+1}}</td>
                    <td><img src="{{$product_image->image}}"  height="80px" width="80px" alt=""></td>
                    <td><a  data-toggle="modal" data-target="#edit_image" product_id="{{$product_image->id}}" class="btn btn-primary edit-btn text-white txt4">{{__('Edit')}}</a></td>
                    @if ($product->images->count()>1)
                    <td> <form action="{{route('vendor.productImage.destroy',$product_image->id)}}" method="POST">
                        @method('DELETE')
                        <button type="submit" class=" btn btn-danger txt4"><i class="icon-trash"></i> {{__('Delete')}}</button>
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
                        <h5 class="modal-title mt-0 txt4" id="myModalLabel">{{__('Update Product')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputFile">{{__('Image')}}</label>
                            <div class="input-group">
                              <div class="custom-file">                
                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">{{__('Choose file')}}</label>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect txt4" data-dismiss="modal">{{__('Cancel')}}</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light txt4">{{__('Update')}}</button>
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
                $('#updateForm').attr('action','{{route('vendor.productImage.update','')}}' +'/'+id);
            });
        });
    </script>
    @endsection