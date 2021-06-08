@extends('layout.user')

@section('title')
    {{__('My Profile')}}
    
@endsection

@section('content')
{{-- {{ dd($user->rejected) }} --}}
@if($user->approve == 0)
    <div class="alert alert-primary border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold txt4">{{__('Your Account Status is Pending. Please Approve Your Account by Completing Profile.')}}</span>
    </div>
@elseif($user->approve == 1 && $user->rejected == true)
    <div class="alert alert-success border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold txt4">{{__('Your Account Is Approved.')}}</span>
    </div>
@elseif($user->rejected == false)
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
                    <form action="{{route('user.profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Name')}}</label>
                                
                                <input value="{{$user->name}}" name="name" type="text" class="form-control txt4" placeholder="{{__('Enter full name')}}" {{ $user->approve == 1 && $user->rejected == true ? 'disabled':''}} required>
                            </div>

                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Email')}}</label>
                                <input value="{{$user->email}}" type="email" class="form-control txt4" placeholder="{{__('Enter email')}}" disabled required>
                            </div> 
                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Phone')}}</label>
                                <input value="{{$user->phone}}" name="phone" type="number" class="form-control txt4" placeholder="{{__('Enter phone')}}" {{ $user->approve == 1 && $user->rejected == true ? 'disabled':''}}  required>
                            </div>

                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Password')}} <small>({{__('Leave Blank to keep original')}})</small> </label>
                                <input name="password" type="password" class="form-control txt4" placeholder="{{__('Enter password')}}">
                            </div>
                            
                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Gender')}}</label>
                                <select  name="gender" type="text" class="form-control txt4" {{ $user->approve == 1 && $user->rejected == true ? 'disabled':''}} required>
                                    <option {{$user->gender == 'male' ? 'selected':''}} value="male">{{__('Male')}}</option>
                                    <option {{$user->gender == 'female' ? 'selected':''}} value="female">{{__('Female')}}</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Date of Birth')}}</label>
                                <input value="{{$user->dob}}" name="dob" type="date" class="form-control txt4" {{ $user->approve == 1 && $user->rejected == true ? 'readonly':''}}  required>
                            </div>

                            <div class="form-group col-md-6 txt4">
                                <label>{{__('City')}}</label>
                                <input value="{{$user->city}}" name="city" type="text" class="form-control txt4" placeholder="{{__('Enter city')}}" {{ $user->approve == 1 && $user->rejected == true ? 'disabled':''}} required>
                            </div>
                            <div class="form-group col-md-6 txt4">
                                <label for="name">{{__('Profile Picture')}}</label>
                                <input name="image" type="file" class="form-input-styled txt4" data-fouc {{ $user->approve == 1 && $user->rejected == true ? 'disabled':''}}>
                            </div>
                            <div class="form-group col-md-6 txt4">
                                <label for="name">{{__('Cnic Front')}}</label>
                                <input name="cnicfront" type="file" class="form-input-styled txt4" data-fouc {{ $user->approve == 1 && $user->rejected == true ? 'disabled':''}}  >
                            </div>
                            <div class="form-group col-md-6 txt4">
                                <label for="name">{{__('Cnic Back')}}</label>
                                <input name="cnicback" type="file" class="form-input-styled txt4" data-fouc {{ $user->approve == 1 && $user->rejected == true ? 'disabled':''}}  >
                            </div>
                            <div class="form-group col-md-12 txt4">
                                <label>{{__('Address')}}</label>
                                <textarea rows="4" name="address" type="text" class="form-control txt4" placeholder="{{__('Enter address')}}" {{ $user->approve == 1 && $user->rejected == true ? 'disabled':''}} required>{{$user->address}}</textarea>
                            </div>

                            <div class="text-right col-md-12">
                                <button type="submit" class=" btn btn-primary txt4">{{__('Update Profile')}}
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
