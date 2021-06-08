@extends('layout.admin')

@section('title')
    All Products
@endsection

@section('content')
    <div class="card">

        <table class="table datatable-save-state table-responsive">
            <thead>
                <tr class="txt4">
                    <th>#</th>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
                    <th>Price</th>
                    <th>Old Price</th>
                    <th>Description</th>
                    <th>Uploaded</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                <tr class="txt4">
                    <td>{{$key+1}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->subcategory->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->old_price}}</td>
                    <td>{{strlen($product->description) > 50 ? substr($product->description,0,80)."..." : $product->description}}<a data-toggle="modal" data-target="#edit_modal" id="{{$product->id}}" name="{{$product->name}}"
                        stock="{{$product->stock}}" cat_id="{{$product->category->id}}" subcat_id="{{$product->subcategory->id}}" price="{{$product->price}}" old_price="{{$product->old_price}}" description="{{$product->description}}" shipping="{{$product->shipping}}" product_no="{{$product->product_no}}" class="edit-btn dropdown-item edit-btn txt4">
                    Read More</a></td>
                    <td>{{$product->vendor->shop_name}}</td>
                    <td><a href="{{route('admin.product.show',$product->id)}}" class="btn btn-primary txt4">View</a></td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item txt4" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">             
                                    <a data-toggle="modal" data-target="#edit_modal" id="{{$product->id}}" name="{{$product->name}}"
                                        stock="{{$product->stock}}" cat_id="{{$product->category->id}}" subcat_id="{{$product->subcategory->id}}" price="{{$product->price}}" old_price="{{$product->old_price}}" description="{{$product->description}}" class="edit-btn dropdown-item edit-btn txt4">
                                    <i class="icon-pencil"></i> Edit</a>
                                    
                                    <form action="{{route('admin.product.destroy',$product->id)}}" method="POST">
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item txt4"><i class="icon-trash"></i> Delete</button>
                                    </form>

                                </div>
                            </div>
                        </div>  
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
                        <h5 class="modal-title mt-0 txt4" id="myModalLabel">Update Product</h5>
                        <button type="button" class="close txt4" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="txt4">Product Name</label>
                            <input class="form-control txt4" type="text" id="name" name="name" placeholder="product Name" required>
                        </div>
                          <div class="form-group">
                            <label for="name" class="txt4">Stock</label>
                            <input class="form-control txt4" type="text" id="stock" name="stock" placeholder="product Name" required>
                        </div>
                        <div class="form-group">
                            <label class="txt4">Category</label>
                            <select id="cat_id" name="cat_id" class="form-control form-control-select2 txt4" data-fouc required>
                                @foreach (App\Models\Category::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="txt4">Sub-Category</label>
                            <select id="subcat_id" name="subcat_id" class="form-control sub_category form-control-select2 txt4" data-fouc required>
                                @foreach (App\Models\SubCategory::all() as $subcat)
                                    <option value="{{$subcat->id}}">{{$subcat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="txt4">price</label>
                            <input class="form-control txt4" type="text" id="price" name="price" placeholder="Price" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="txt4">Stock</label>
                            <input class="form-control txt4" type="text" id="old_price" name="old_price" placeholder="Old Price" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="txt4">Description</label>
                            <textarea name="description" class="form-control txt4" id="description" cols="20" rows="5"></textarea>
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
                let id = this.id;
                let name = $(this).attr('name');
                let stock = $(this).attr('stock');
                let price = $(this).attr('price');
                let old_price = $(this).attr('old_price');
                let description = $(this).attr('description');
                let cat_id = $(this).attr('cat_id');
                let subcat_id = $(this).attr('subcat_id');
                $('#name').val(name);
                $('#price').val(price);
                $('#stock').val(stock);
                $('#old_price').val(old_price);
                $('#description').val(description);
                $('#cat_id').val(cat_id).change();
                $('#subcat_id').val(subcat_id).change();

             $('#updateForm').attr('action','{{route('admin.product.update','')}}' +'/'+id);

            });
        });
    </script>

<script>
    $(document).ready(function(){
            $('#cat_id').on('change',function(){
                 let cat_id = $(this).val();
                 $.ajax({
                    url: "{{route('vendor.fetch_subcat')}}",
                    method: 'post',
                    data: {
                        id: cat_id
                    },
                    success: function(result){
                        console.log(result);
                        appendOptionsList(result,$('.sub_category'));
                    }
            });
        });
        function appendOptionsList(result,div) {
            div.empty();
            div.append('<option selected disabled>Select Sub-Category</option>');
            for (i=0;i<result.length;i++){
                div.append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
            }
        } 
    });


</script>
    @endsection