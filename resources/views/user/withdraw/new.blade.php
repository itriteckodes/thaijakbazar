@extends('layout.user')

@section('title')
    {{__('Withdraw Request')}}
@endsection
{{-- {{dd(Auth::user()->CanWithdrawAccount->count())}} --}}
@section('content')
@if (Auth::user()->CanWithdrawAccount->count() == 0)
    <div class="alert alert-primary border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold">{{__('Please Approve Your Withdraw Account to Make Withdraw Request.')}}</span>
    </div>
@endif
    <div class="row">

        <div class="col-md-12">
            <!-- Basic layout-->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title txt4">{{__('Withdraw Request')}}</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('user.withdraw.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            
                            <div class="col-md-6 txt4">
                                <label> {{__('Enter Amount')}} <small>({{__('your current account balance is')}} :PKR {{ Auth::user()->account == null ? '0': Auth::user()->account->balance }})</small></label>
                                <input name="amount" type="number" min="1"  max="{{ Auth::user()->account == null ? '0': Auth::user()->account->balance }}" class="form-control txt4" placeholder="{{__('Enter Withdraw Amount')}}" required>
                            </div>
                            <div class="form-group col-md-6 txt4">
                                <label>{{__('Select Withdraw Account')}}</label>
                                <select  name="withdrawaccount_id" class="form-control txt4" placeholder="{{__('Enter Amount')}}" required>
                                    @foreach (Auth::user()->CanWithdrawAccount as $account)
                                        <option value="{{$account->id}}">{{$account->withdrawMethod->name}} {{ $account->account_no }}</option>
                                    @endforeach
                                </select>
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
