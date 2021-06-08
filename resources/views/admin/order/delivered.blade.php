@extends('layout.admin')

@section('title')
    Delivered Orders
@endsection

@section('content')
    <div class="card">

        <table class="table datatable-save-state table-responsive">
            <thead>
                <tr class="txt4">
                    <th>#</th>
                    <th>Name</th>
                    <th>Order No</th>
                    <th>Address</th>
                    <th>Subtotal</th>
                    <th>Tax</th>
                    <th>Discount</th>
                    <th>Grand Total</th>
                    <th>Payment Method</th>
                    <th>Vendor</th>
                    <th>Add Comment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                <tr class="txt4">
                    <td>{{$key+1}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->id}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->subtotal}}</td>
                    <td>{{$order->tax}}</td>
                    <td>{{$order->discount}}</td>
                    <td>{{$order->grand_total}}</td>
                    <td>{{$order->type}}</td>
                    <td>{{$order->vendor->name}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit_modal" id="{{$order->id}}"
                            class="edit-btn btn btn-secondary txt4">Comments</button>
                    </td>
                    <td><a href="{{route('admin.order.details',$order->id)}}" class="btn btn-primary txt4">View</a></td>
                   
                </tr>
                @endforeach
                
               
            </tbody>
        </table>
    </div>

{{-- COMMENT AREA --}}
<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="commentForm" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 txt4" id="myModalLabel">Add Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="txt4">Comment</label>
                        <input class="form-control txt4" type="text" name="comment" placeholder="Comment"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect txt4"
                        data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light txt4">Send</button>
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
            $('#id').val(id);
            $('#commentForm').attr('action','{{route('admin.add-comment','')}}' +'/'+id);
        });
    });
</script>
@endsection