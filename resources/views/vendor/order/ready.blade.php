@extends('layout.vendor')

@section('title')
{{__('Ready To Ship Orders')}}
@endsection

@section('content')
<div class="card">

    <table class="table datatable-save-state table-responsive">
        <thead>
            <tr class="txt4">
                <th>{{__('')}}</th>
                <th>{{__('Name')}}</th>
                <th>{{__('Order No')}}</th>
                <th>{{__('Address')}}</th>
                <th>{{__('Subtotal')}}</th>
                <th>{{__('Tax')}}</th>
                <th>{{__('Discount')}}</th>
                <th>{{__('Grand Total')}}</th>
                <th>{{__('Payment Method')}}</th>
                <th>{{__('Vendor')}}</th>
                <th>{{__('Update Status')}}</th>
                <th>{{__('Add Comments')}}</th>
                <th>{{__('Action')}}</th>
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
                <td class="text-center">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('vendor.order.status.deliver',$order->id)}}"
                                    class="edit-btn dropdown-item edit-btn txt4">
                                    <i class="icon-stack"></i> {{__('delivered')}}</a>

                                <a href="{{route('vendor.order.status.dispatch',$order->id)}}"
                                    class="edit-btn dropdown-item edit-btn txt4">
                                    <i class="icon-pencil"></i> {{__('dispatched')}}</a>

                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <button data-toggle="modal" data-target="#edit_modal" id="{{$order->id}}"
                        class="edit-btn btn btn-secondary txt4">{{__('Comments')}}</button>
                </td>
                <td><a href="{{route('admin.order.details',$order->id)}}" class="btn btn-primary txt4">{{__('View')}}</a></td>
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
                    <h5 class="modal-title mt-0 txt4" id="myModalLabel">{{__('Add Comment')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="txt4">{{__('Comment')}}</label>
                        <input class="form-control txt4" type="text" name="comment" placeholder="{{__('Comment')}}"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect txt4"
                        data-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light txt4">{{__('Send')}}</button>
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