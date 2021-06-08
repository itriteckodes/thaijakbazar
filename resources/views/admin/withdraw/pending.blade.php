@extends('layout.admin')

@section('title')
    Withdraw
@endsection

@section('content')
<div class="card">

    <table class="table datatable-save-state datatable-responsive">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>Title</th>
                <th>Account No.</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Type</th>
                <th>Status</th>
                <th>Action</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $key => $request)
                <tr class="txt4">
                <td>{{$key+1}}</td>
                <td>{{$request->withdrawAccount->title}}</td>
                <td>{{$request->withdrawAccount->account_no}}</td>
                <td>{{$request->amount}}</td>
                <td>{{$request->withdrawAccount->withdrawMethod->name}}</td>
                
                <td>
                    @if ($request->user_id == null)
                        Vendor
                    @else 
                        User
                    @endif
                </td>
                <td>
                    @if ($request->status == 0)
                        Pending
                    @endif
                </td>
                <td><button id="{{$request->id}}" data-toggle="modal" data-target="#accept" class="edit-btn btn btn-primary txt4">Accepted</button> </td>
                <td><button id="{{$request->id}}" data-toggle="modal" data-target="#reject"   class="reject-btn btn btn-danger txt4">Rejected</button></td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- <div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 txt4" id="myModalLabel">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                  

                    <div class="form-group txt4">
                        <label for="name">Name</label>
                        <input class="form-control txt4" type="text" id="name" name="name" placeholder="Category Name" required>
                    </div>
                    <div class="form-group txt4">
                        <label for="name">Category Picture</label>
                        <input name="image" type="file" class="form-input-styled txt4" data-fouc>
                    </div>
                    <div class="form-group txt4">
                        <label for="name">Category Picture (Mobile)</label>
                        <input name="mobileimage" type="file" class="form-input-styled txt4" data-fouc>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect txt4" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light txt4">Update</button>
                </div>
            </div>
        </form>
    </div>
</div> --}}

<div id="accept" class="modal fade">
    <div class="modal-dialog modal-xs">
        <form id="acceptform" method="POST" enctype="multipart/form-data">
            
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title mt-0 txt4" id="myModalLabel">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="" class="txt4">Are you sure you want to Acept ?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="withdraw_id" id="accept_id">
                    <button type="submit" class="btn btn-success waves-effect waves-light txt4">Accept</button>
                    <button type="button" class="btn btn-primary waves-effect txt4" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="reject" class="modal fade">
    <div class="modal-dialog modal-xs">
        <form id="deleteForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title mt-0 txt4" id="myModalLabel">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="" class="txt4">Are you sure you want to Reject ?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="withdraw_id" id="reject_id">
                    <button type="submit" class="btn btn-danger waves-effect waves-light txt4">Reject</button>
                    <button type="button" class="btn btn-primary waves-effect txt4" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('body').on('click', '.edit-btn', function(){
            
            let id = $(this).attr('id');
            $('#accept_id').val(id);
            $('#acceptform').attr('action','{{route('admin.accept','')}}');
        });

        $('body').on('click', '.reject-btn', function(){
                let id = $(this).attr('id');
                $('#reject_id').val(id);
                $('#deleteForm').attr('action','{{route('admin.reject','')}}');
            });
    });
</script>
@endsection
