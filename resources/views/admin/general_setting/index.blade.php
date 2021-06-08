@extends('layout.admin')

@section('title')
    General Setting
@endsection

@section('content')
   
    <div class="row">
        <div class="col-md-12">
            <!-- Basic layout-->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title txt3">Update Setting</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.setting.update',$setting->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-4 txt4">
                                <label for="name" class="">Logo (640 x 182)</label>
                                <input name="logo" type="file" class="form-input-styled txt3" data-fouc>
                            </div>
                            <div class="form-group col-md-4 txt4">
                                <label>Email</label>
                                <input value="{{$setting->email}}" name="email" type="email" class="form-control txt4" placeholder="Enter email">
                            </div>
                            <div class="form-group col-md-4 txt4">
                                <label>Phone</label>
                                <input value="{{$setting->phone}}" name="phone" type="text" class="form-control txt4" placeholder="Enter phone" >
                            </div>
                            <div class="form-group col-md-4 txt4">
                                <label>Address</label>
                                <input value="{{$setting->address}}" name="address" type="text" class="form-control txt4" placeholder="Enter address" >
                            </div>

                            
                            <div class="form-group col-md-4 txt4">
                                <label>Facebook</label>
                                <input value="{{$setting->facebook}}" name="facebook" type="text" class="form-control txt4" placeholder="Enter facebook address" >
                            </div>
                            <div class="form-group col-md-4 txt4">
                                <label>Instagram</label>
                                <input value="{{$setting->instagram}}" name="instagram" type="text" class="form-control txt4" placeholder="Enter instagram address" >
                            </div>
                            <div class="form-group col-md-4 txt4">
                                <label>Twitter</label>
                                <input value="{{$setting->twitter}}" name="twitter" type="text" class="form-control txt4" placeholder="Enter twitter address" >
                            </div>
                            <div class="form-group col-md-4 txt4">
                                <label>Youtube</label>
                                <input value="{{$setting->youtube}}" name="youtube" type="text" class="form-control txt4" placeholder="Enter youtube address" >
                            </div>

                            <div class="text-right col-md-12">
                                <button type="submit" class=" btn btn-primary txt4">Update
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
