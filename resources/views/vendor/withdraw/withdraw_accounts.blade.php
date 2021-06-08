@extends('layout.vendor')

@section('title')
    {{__('Create Withdraw Account')}}
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">
            <!-- Basic layout-->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title txt4">{{__('Create Withdraw Method Request')}}</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form class="formloader" action="{{route('vendor.withdraw-account.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Title')}}</label>
                                <input value="" name="title" type="text" class="form-control txt4" placeholder="{{__('Enter full name')}}" required>
                            </div>

                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Account No.')}}</label>
                                <input value="" type="text" name="account_no" class="form-control txt4" placeholder="{{__('Enter number')}}" required>
                            </div> 
                            
                          
                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Select Withdraw Method')}}</label>
                                <select id="select"  name="withdrawmethod_id" class="form-control txt4" placeholder="{{__('Enter Amount')}}" required>
                                    @foreach (App\Models\WithdrawMethod::where('country_id',Auth::user()->country_id)->get() as $method)
                                        <option value="{{$method->id}}">{{$method->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 txt4">
                                <label for="name" id="identity">{{__('Identity')}}</label>
                                <input name="image" type="file" class="form-input-styled txt4" required>
                            </div>
                            <div class="form-group col-md-12 txt4">
                                <label>{{__('Description')}}</label>
                                <textarea rows="4" name="description" class="form-control txt4" placeholder="{{__('Description (Optional)')}}"></textarea>
                            </div> 

                            <div class="text-right col-md-12">
                                <button type="submit" class=" btn btn-primary txt4">{{__('Make Request')}}
                                    <i class="icon-paperplane ml-2"></i>
                                </button>
                            </div>
                            <input type="hidden" name="country_id" value="{{Auth::user()->country_id}}" required>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /basic layout -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            
            $("#select").change(function() {
                var selected = $("#select option:selected").text();
                $("#identity").html("Identity of "+selected);
            });

            $("#select").change();

            $('.formloader').on('submit',function(){
                $('.preloader').show();
            });

        });
    </script>
@endsection
