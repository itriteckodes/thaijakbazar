@extends('layout.vendor')


@section('title')
{{__('Add New Coupan')}}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title txt4">{{__('Add New Coupan')}}</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form class="formloader" action="{{route('vendor.coupan.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 txt4">
                            <label>{{__('Name')}}</label>

                            <input name="name" type="text" class="form-control txt4"
                                placeholder=" {{__('Enter Coupon Name')}} " required>
                        </div>
                        <div class="col-md-6 txt4">
                            <label>{{__('Code')}}</label>
                            <input name="code" type="text" class="form-control txt4" placeholder="{{__('Enter Code')}}"
                                required>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-6 txt4">
                            <label>{{__('Rate')}}</label>
                            <input name="rate" type="number" class="form-control txt4"
                                placeholder="{{__('Enter Rate')}}" required>
                        </div>
                    </div>
                    <input type="hidden" name="country_id" value="{{Auth::user()->country_id}}" required>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary txt4">{{__('Save')}} <i
                                class="icon-paperplane ml-2"></i></button>
                    </div>
                    <input type="hidden" name="country_id" value="{{Auth::user()->country_id}}" required>

                </form>
            </div>
        </div>
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
