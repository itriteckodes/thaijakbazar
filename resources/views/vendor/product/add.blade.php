@extends('layout.vendor')


@section('title')
{{__('Add Product')}}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">

        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title txt4">{{__('Add New Product')}}</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form class="formloader" action="{{route('vendor.product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 txt4">
                            <label>{{__('Name')}}</label>
                            <input name="name" type="text" class="form-control txt4" placeholder="{{__('Enter product Name')}}" required>
                        </div>
                        <div class="col-md-6 txt4">
                            <label>{{__('Category')}}</label>
                            <select class="form-control form-control-select2 txt4" id="mcategory" name="cat_id" required>
                                
                                @foreach (App\Models\Category::where('country_id',Auth::user()->country_id)->get() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 txt4">
                            <label>{{__('Sub-Category')}}</label>
                            <select class="form-control form-control-select2 sub_category txt4" name="subcat_id" required>
                                <option selected>{{__('Select Sub-Category')}}</option>
                            </select>
                        </div>
                        <div class="col-md-6 txt4">
                            <label>{{__('Stock')}}</label>
                            <input name="stock" type="number" class="form-control txt4" placeholder="{{__('Enter Stock')}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 txt4">
                            <label>{{__('Price')}}</label>
                            <input name="price" type="number" class="form-control txt4" placeholder="{{__('Enter Price')}}" required>
                        </div>

                        <div class="col-md-6 txt4">
                            <label>Old-Price</label>
                            <input name="old_price" type="number" class="form-control txt4" placeholder="{{__('Enter Old Price')}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 txt4">
                            <label>{{__('Choose Images')}}</label>
                            <input name="images[]" type="file" class="form-input-styled txt4" multiple required>
                        </div>
                        <div class="col-md-6 txt4">
                            <label>{{__('Shipping')}}</label>
                            <input min="1" name="shipping" type="number"  class="form-control txt4" required>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 txt4">
                            <label>{{__('Product Code')}}</label>
                            <input name="product_no" type="text" class="form-control txt4" placeholder="{{__('Enter Product Code')}}" required>
                        </div>
                        <div class="col-md-6 txt4">
                            <label>{{__('Description')}}</label>
                            <textarea name="description" class="form-control txt4" required></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="country_id" value="{{Auth::user()->country_id}}" required>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary txt4">{{__('Save')}} <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
            

        $('#mcategory').on('change',function(){
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
            // div.append('<option selected disabled>Select Sub-Category</option>');
            for (i=0;i<result.length;i++){
                div.append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
            }

        } 
        $('#mcategory').change();

        $('.formloader').on('submit',function(){
            $('.preloader').show();
        })
    });


</script>
@endsection