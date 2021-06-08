@extends('layout.vendor')

@section('title')
    {{__('Settings')}}
@endsection

@section('content')
    @php
        $user = Auth::user();
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- Basic layout-->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title txt4">{{__('Update store settings')}}</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form class="formloader" action="{{route('vendor.setting.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4 txt4">
                                <label>{{__('Order Tax')}}</label>
                                <input value="{{App\Values\SetValue::OrderTax()}}" name="tax_rate" type="number" class="form-control txt4" placeholder="{{__('Enter Tax Rate')}}" disabled required>
                            </div>

                            <div class="form-group col-md-4 txt4">
                                <label>{{__('Shipping Rate')}}</label> 
                                <input value="{{App\Values\SetValue::CompanyCommission()}}" name="shipping_rate" type="number" class="form-control txt4" placeholder="{{__('Enter shipping Rate')}}" disabled required>
                            </div>

                            <div class="form-group col-md-4 txt4">
                                <label for="name">{{__('Store Logo')}}</label>
                                <input name="image" type="file" class="form-control">
                            </div>  
                        </div>
                        <div class="row">
                            <div class="text-right col-md-12">
                                <button type="submit" class=" btn btn-primary txt4">{{__('proceed')}}
                                    <i class="icon-plus22 ml-2"></i>
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="country_id" value="{{Auth::user()->country_id}}" required>
                    </form>
                </div>
            </div>
            <!-- /basic layout -->
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        
        $('.formloader').on('submit',function(){
            $('.preloader').show();
        });
    });
</script>
@endsection
