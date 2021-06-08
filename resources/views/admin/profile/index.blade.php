@extends('layout.admin')

@section('title')
    Admin Profile
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
            <h5 class="card-title txt4">Update Profile</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{route('admin.profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-4 txt4">
                        <label>Name</label>
                        <input value="{{$user->name}}" name="name" type="text" class="form-control txt4" placeholder="Enter full name" required>
                    </div>

                    <div class="form-group col-md-4 txt4">
                        <label>Email</label>
                        <input value="{{$user->email}}" name="email" type="email" class="form-control txt4" placeholder="Enter email" required>
                    </div>

                    <div class="form-group col-md-4 txt4">
                        <label>Password <small>(Leave Blank to keep original)</small> </label>
                        <input name="password" type="password" class="form-control txt4" placeholder="Enter password">
                    </div>
                    <div class="text-right col-md-12">
                        <button type="submit" class=" btn btn-primary txt4">Update Profile
                            <i class="icon-plus22 ml-2"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /basic layout -->
</div>
</div>

@endsection
