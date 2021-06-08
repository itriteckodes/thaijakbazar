@extends('layout.user')

@section('title')
    {{__('Create Ticket')}}
@endsection

@section('content')
<div class="row">

    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title txt4">{{__('Enter Your Issue')}}</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('user.ticket.store')}}" method="post" enctype="multipart/form-data">
                   @csrf
                    <div class="row">
                        
                        <div class="form-group col-md-12 txt4">
                            <label>{{__('Ticket')}}</label>
                            <textarea rows="4" name="ticket" type="text" class="form-control txt4" placeholder="{{__('Enter address')}}" required></textarea>
                        </div>
                        <input type="hidden" name="country_id" value="{{Auth::user()->country_id}}" required>
                        <div class="text-right col-md-12">
                            <button type="submit" class=" btn btn-primary txt4">{{__('Add')}}
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