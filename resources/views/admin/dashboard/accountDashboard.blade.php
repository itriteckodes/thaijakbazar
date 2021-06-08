@extends('layout.admin')

@section('title')
 Account Dashboard
@endsection

@section('content')

<div class="row">
    <div class="col-md-2">
        <a href="{{route('admin.transaction.company')}}">
            <div class="card card-body bg-info-600  has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h6 class="mb-0">{{ App\Models\Transaction::where('account_id',1)->where('country_id',Session::get('country_id'))->count() }}</h6>
                        <span class="font-size-xs txt4">Total Transaction</span>
                    </div>
                    <i class="icon-cash2 opacity-75"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-2">
        <a>
            <div class="card card-body bg-info-600 has-bg-image">
                <div class="media">
                    <i class="icon-cash3 opacity-75"></i>
                    <div class="media-body text-right">
                        <h6 class="mb-0">PKR {{ App\Models\Account::find(1)->profit }}/-</h6>
                        <span class="font-size-xs txt4">Company Profit</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <a href="{{route('admin.category.index')}}">
            <div class="card card-body bg-success-400 has-bg-image">
                <div class="media">
                    <i class="icon-wallet opacity-75"></i>
                    <div class="media-body text-right">
                        <h6 class="mb-0 txt3">PKR {{ App\Models\Account::find(1)->balance }}/-</h6>
                        <span class="font-size-xs txt3">Balance</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <a data-toggle="modal" data-target="#add_modal">
            <div class="card card-body bg-warning has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h6 class="mb-0">Add</h6>
                        <span class="font-size-xs txt4">Balance</span>
                    </div>
                    <i class="icon-folder-plus4 opacity-75"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-2">
        <a data-toggle="modal" data-target="#subtract_modal">
            <div class="card card-body bg-danger-400 has-bg-image">
                <div class="media">
                    <i class="icon-folder-minus4 opacity-75"></i>
                    <div class="media-body text-right">
                        <h6 class="mb-0">Subtract</h6>
                        <span class="font-size-xs txt4">Balance</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>


<div id="add_modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{ route('admin.comp-add-bal') }}" id="updateForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title mt-0 txt4" id="myModalLabel">Add Balance</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <div class="form-group txt4">
                        <label for="name">Amount</label>
                        <input class="form-control txt4" type="number" id="amount" name="balance"
                            placeholder="Enter Amount" required>
                    </div>
                    <div class="form-group txt4">
                        <label for="description">Comment</label>
                        <input class="form-control txt4" type="text" id="description" name="description" placeholder="Enter Comment">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect txt4"
                        data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light txt4">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="subtract_modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{ route('admin.comp-sub-bal') }}" id="updateForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title mt-0 txt4" id="myModalLabel">Subtract Balance</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <div class="form-group txt4">
                        <label for="name">Amount</label>
                        <input class="form-control txt4" type="number" id="amount" name="balance"
                            placeholder="Enter Amount" required>
                    </div>
                    <div class="form-group txt4">
                        <label for="description">Comment</label>
                        <input class="form-control txt4" type="text" id="description" name="description" placeholder="Enter Comment">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect txt4"
                        data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light txt4">Subtract</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection