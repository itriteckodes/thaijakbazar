@extends('layout.admin')

@section('title')
    {{__('Account Approval')}}
@endsection

@section('content')

<div class="card">

    <table class="table datatable-save-state table-responsive">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>Type</th>
                <th>Picture</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>CNIC Front</th>
                <th>CNIC Back</th>
                <th>Status</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($approvals as $key => $approval)
            <tr class="txt4">
                <td>{{$key+1}}</td>
               <td>{{$approval->type}}</td>
                <td><img src="{{$approval->user->image}}" alt="" height="80px" width="80px"></td>
                <td>{{$approval->user->name}}</td>
                <td>{{$approval->user->email}}</td>
                <td>{{$approval->user->phone}}</td>
                <td><a href="{{$approval->user->cnicfront}}" target="_blank"><img src="{{$approval->user->cnicfront}}" alt="" height="80px" width="80px"></a></td>
                <td><a href="{{$approval->user->cnicback}}" target="_blank"><img src="{{$approval->user->cnicback}}" alt="" height="80px" width="80px"></a></td>
                <td><span class="badge badge-info"> {{$approval->status}}</span></td>
                
                <td>
                    <button data-toggle="modal" data-target="#accept_modal" id="{{$approval->id}}" class="accept-btn btn btn-success txt4">Accept</button>
                </td>
                <td>
                    <button data-toggle="modal" data-target="#reject_modal" id="{{$approval->id}}" class="reject-btn btn btn-danger txt4">Reject</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



<div id="reject_modal" class="modal fade">
    <div class="modal-dialog modal-xs">
        <form id="rejectForm" method="POST" enctype="multipart/form-data">
            @method('DELETE')
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
                    <button type="submit" class="btn btn-danger waves-effect waves-light txt4">Reject</button>
                    <button type="button" class="btn btn-primary waves-effect txt4" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="accept_modal" class="modal fade">
    <div class="modal-dialog modal-xs">
        <form id="acceptForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title mt-0 txt4" id="myModalLabel">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="" class="txt4">Are you sure you want to Accept ?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light txt4">Accept</button>
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
        $('body').on('click', '.accept-btn', function(){
            let id = $(this).attr('id');
            $('#acceptForm').attr('action','{{route('admin.account-approval.update','')}}' +'/'+id);
        });

        $('body').on('click', '.reject-btn', function(){
                let id = $(this).attr('id');
                $('#rejectForm').attr('action','{{route('admin.account-approval.destroy','')}}' +'/'+id);
            });
    });
</script>
@endsection
