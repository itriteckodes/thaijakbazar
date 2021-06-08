@extends('layout.vendor')

@section('title')
    {{__('Vendor Profile')}}
@endsection

@section('content')
    @php
        $user = Auth::user();
    @endphp
    @if ($user->approve == 0)
    <div class="alert alert-primary border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold txt4">{{__('Your Account Status is Pending. Please Approve Your Account by Completing Profile.')}}</span>
    </div>
@elseif($user->approve == 1)
    <div class="alert alert-success border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold txt4">{{__('Your Account Is Approved.')}}</span>
    </div>
@else
    <div class="alert alert-danger border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold txt4">{{__('Your Account Is Not Approved. Please Complete Your Profile Again.')}}</span>
    </div>

@endif
    <div class="row">
        <div class="col-md-12">
            <!-- Basic layout-->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title txt4">{{__('Update Profile')}}</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form class="formloader" action="{{route('vendor.profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Name')}}</label>
                                <input value="{{$user->name}}" name="name" type="text" class="form-control txt4" placeholder="{{__('Enter full name')}}" {{ $user->approve == 1 ? 'readonly':''}} required>
                            </div>
                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Shop Name')}}</label>
                                <input value="{{$user->shop_name}}" name="shop_name" type="text" class="form-control txt4" placeholder="{{__('Enter shop name')}}" {{ $user->approve == 1 ? 'readonly':''}} required>
                            </div>

                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Email')}}</label>
                                <input value="{{$user->email}}" name="email" type="email" class="form-control txt4" placeholder="{{__('Enter email')}}" readonly>
                            </div>

                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Phone')}} </label>
                                <input name="phone" value="{{$user->phone}}" type="number" class="form-control txt4" placeholder="{{__('Enter Phone')}}"  {{ $user->approve == 1 ? 'readonly':''}} >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Description')}} </label>
                                <input name="description" value="{{$user->description}}" type="text" class="form-control txt4" placeholder="{{__('Enter description')}}"  {{ $user->approve == 1 ? 'readonly':''}} >
                            </div>
                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Password ')}}<small>({{__('Leave Blank to keep original')}})</small> </label>
                                <input name="password" type="password" class="form-control txt4" placeholder="{{__('Enter password')}}">
                            </div>
                            <div class="form-group col-md-4 txt4">
                                <label for="name">{{__('Shop Picture')}}</label>
                                <input name="image" type="file" class="form-input-styled txt4" data-fouc  {{ $user->approve == 1 ? 'disabled':''}} >
                            </div>
                            <div class="form-group col-md-4 txt4">
                                <label for="name">{{__('Cnic Front')}}</label>
                                <input name="cnicfront" type="file" class="form-input-styled txt4" data-fouc {{ $user->approve == 1 ? 'disabled':''}}>
                            </div>
                            <div class="form-group col-md-4 txt4">
                                <label for="name">{{__('Cnic Back')}}</label>
                                <input name="cnicback" type="file" class="form-input-styled txt4" data-fouc {{ $user->approve == 1 ? 'disabled':''}}>
                            </div>
                            <div class="form-group col-md-12 txt4">
                                <label>{{__('Address')}}</label>
                                <textarea rows="4" name="address"  class="form-control txt4" >{{ $user->address }}</textarea>
                            </div>
                            <div class="text-right col-md-12">
                                <button type="submit" class="btn btn-primary txt4">{{__('Update Profile')}}
                                    <i class="icon-plus22 ml-2"></i>
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
    $(document).ready(function(){
      
        
        $('.formloader').on('submit',function(){
            $('.preloader').show();
        })
    });
</script>
@endsection

