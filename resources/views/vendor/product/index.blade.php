@extends('layout.vendor')

@section('title')
    {{__('Your Products')}}
@endsection

@section('content')
    <div class="card">

        <table class="table datatable-save-state table-responsive">
            <thead>
                <tr class="txt4">
                    <th>#</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Stock')}}</th>
                    <th>{{__('Category')}}</th>
                    <th>{{__('Sub-Category')}}</th>
                    <th>{{__('Price')}}</th>
                    <th>{{__('Old Price')}}</th>
                    <th>{{__('Shipping')}}</th>
                    <th>{{__('Product Code')}}</th>
                    <th>{{__('Description')}}</th>
                    <th>{{__('Product Images')}}</th>
                    <th>{{__('Action')}}</th>
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
                    <td>{{$product->shipping}}</td>
                    <td>{{$product->product_no}}</td>
                    <td>{{strlen($product->description) > 50 ? substr($product->description,0,80)."..." : $product->description}}<a data-toggle="modal" data-target="#edit_modal" id="{{$product->id}}" name="{{$product->name}}"
                        stock="{{$product->stock}}" cat_id="{{$product->category->id}}" subcat_id="{{$product->subcategory->id}}" price="{{$product->price}}" old_price="{{$product->old_price}}" description="{{$product->description}}" shipping="{{$product->shipping}}" product_no="{{$product->product_no}}" class="edit-btn dropdown-item edit-btn txt4">
                    {{__('Read More')}}</a></td>
                    <td><a href="{{route('vendor.product.images',$product->id)}}" class="btn btn-primary btn-sm txt4">{{__('View Images')}}</a></td>

                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">             
                                    <a data-toggle="modal" data-target="#edit_modal" id="{{$product->id}}" name="{{$product->name}}"
                                        stock="{{$product->stock}}" cat_id="{{$product->category->id}}" subcat_id="{{$product->subcategory->id}}" price="{{$product->price}}" old_price="{{$product->old_price}}" description="{{$product->description}}"  shipping="{{$product->shipping}}" product_no="{{$product->product_no}}" class="edit-btn dropdown-item edit-btn txt4">
                                    <i class="icon-pencil"></i> {{__('Edit')}}</a>
                                    
                                    <form action="{{route('vendor.product.destroy',$product->id)}}" method="POST">
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item txt4"><i class="icon-trash"></i> {{__('Delete')}}</button>
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
                        <h5 class="modal-title mt-0 txt4" id="myModalLabel">{{__('Update Product')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group txt4">
                            <label for="name">{{__('Product Name')}}</label>
                            <input class="form-control txt4" type="text" id="name" name="name" placeholder="{{__('product Name')}}" required>
                        </div>
                          <div class="form-group txt4">
                            <label for="name">{{__('Stock')}}</label>
                            <input class="form-control txt4" type="text" id="stock" name="stock" placeholder="{{__('Stock')}}" required>
                        </div>
                        <div class="form-group txt4">
                            <label>{{__('Category')}}</label>
                            <select id="cat_id" name="cat_id" class="form-control form-control-select2 txt4" data-fouc required>
                                @foreach (App\Models\Category::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group txt4">
                            <label>{{__('Sub-Category')}}</label>
                            <select id="subcat_id" name="subcat_id" class="form-control sub_category form-control-select2 txt4" data-fouc required>
                                @foreach (App\Models\SubCategory::all() as $subcat)
                                    <option value="{{$subcat->id}}">{{$subcat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group txt4">
                            <label for="name">{{__('price')}}</label>
                            <input class="form-control txt4" type="text" id="price" name="price" placeholder="{{__('Price')}}" required>
                        </div>
                        <div class="form-group txt4">
                            <label for="name">{{__('Old Price')}}</label>
                            <input class="form-control txt4" type="text" id="old_price" name="old_price" placeholder="{{__('Old Price')}}" required>
                        </div>
                        <div class="form-group txt4">
                            <label for="name">{{__('Shipping')}}</label>
                            <input class="form-control txt4" type="number" id="shipping" name="shipping" placeholder="{{__('Shipping Price')}}" required>
                        </div>
                        <div class="form-group txt4">
                            <label for="name">{{__('Product Code')}}</label>
                            <input class="form-control txt4" type="number" id="product_no" name="product_no" placeholder="{{__('Product Code')}}" required>
                        </div>
                        
                        <div class="form-group txt4">
                            <label for="name">{{__('Description')}}</label>
                            <textarea name="description" class="form-control txt4" id="description" cols="20" rows="5"></textarea>
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
                let id = this.id;
                let name = $(this).attr('name');
                let stock = $(this).attr('stock');
                let price = $(this).attr('price');
                let old_price = $(this).attr('old_price');
                let description = $(this).attr('description');
                let cat_id = $(this).attr('cat_id');
                let subcat_id = $(this).attr('subcat_id');
                let shipping = $(this).attr('shipping');
                let product_no = $(this).attr('product_no');

                $('#name').val(name);
                $('#price').val(price);
                $('#stock').val(stock);
                $('#old_price').val(old_price);
                $('#shipping').val(shipping);
                $('#product_no').val(product_no);
                $('#description').val(description);
                $('#cat_id').val(cat_id).change();
                $('#subcat_id').val(subcat_id).change();

                 $('#updateForm').attr('action','{{route('vendor.product.update','')}}' +'/'+id);

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