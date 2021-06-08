@extends('layout.admin')

@section('title')
    Withdraw Account Requests
@endsection

@section('content')
<div class="card">

    <table class="table datatable-save-state table-responsive">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>Type</th>
                <th>Title</th>
                <th>Acount No.</th>
                <th>Method</th>
                <th>Identity</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($withdrawaccounts as $key => $request)
                <tr class="txt4">
                <td>{{$key+1}}</td>
                <td>
                    @if ($request->user_id == null)
                        Vendor
                    @else
                        User
                    @endif
                </td>
                <td>{{$request->title}}</td>
                <td>{{$request->account_no}}</td>
                <td>{{$request->withdrawMethod->name}}</td>
                <td><a href="{{asset($request->image)}}" target="_blank"><img src="{{asset($request->image)}}" alt="" height="100px" width="100px"></a></td>
                <td>{{$request->description}}</td>
                <td>
                    @if ($request->status == 1)
                    <span class="badge badge-success txt4">Approved</span> 
                @elseif($request->status == 2)
                    <span class="badge badge-danger txt4"> Rejected </span>
                @else
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
                    <input type="hidden" name="request_id" id="accept_id">
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
                    <input type="hidden" name="request_id" id="reject_id">
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
            $('#acceptform').attr('action','{{route('admin.withdraw.account.accept','')}}');
        });

        $('body').on('click', '.reject-btn', function(){
                let id = $(this).attr('id');
                $('#reject_id').val(id);
                $('#deleteForm').attr('action','{{route('admin.withdraw.account.reject','')}}');
            });
    });
</script>
@endsection
