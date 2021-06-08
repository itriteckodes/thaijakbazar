@extends('layout.vendor')

@section('title')
    Your Coupans
@endsection

@section('content')
    <div class="card">

        <table class="table datatable-save-state">
            <thead>
                <tr class="txt4">
                    <th>#</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Code')}}</th>
                    <th>{{__('Rate')}}</th>
                    <th>{{__('Action')}}</th>
                    <th>{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupans as $key => $coupan)
                <tr class="txt4">
                    <td>{{$key+1}}</td>
                    <td>{{$coupan->name}}</td>
                    <td>{{$coupan->code}}</td>
                    <td>{{$coupan->rate}}</td>
                    <td><a  data-toggle="modal" data-target="#edit_coupan" id="{{$coupan->id}}" name="{{$coupan->name}}" code="{{$coupan->code}}" rate="{{$coupan->rate}}" class="btn btn-primary edit-btn text-white txt4">Edit</a></td>
                    <td> <form action="{{route('vendor.coupan.destroy',$coupan->id)}}" method="POST">
                        @method('DELETE')
                        <button type="submit" class=" btn btn-danger txt4"> {{__('Delete')}}</button>
                    </form></td>
                </tr>
                @endforeach
                
               
            </tbody>
        </table>
    </div>
    <div id="edit_coupan" class="modal fade">
        <div class="modal-dialog">
            <form id="updateForm" method="POST" enctype="multipart/form-data">
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0 txt4" id="myModalLabel">{{__('Update Coupan')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group txt4 ">
                            <label for="name">{{__('Coupan Name')}}</label>
                            <input class="form-control txt4 " type="text" id="name" name="name" placeholder="{{__('product Name')}}" required>
                        </div>
                          <div class="form-group txt4   ">
                            <label for="name">{{__('Code')}}</label>
                            <input class="form-control txt4 " type="text" id="code" name="code" placeholder="{{__('product Name')}}" required>
                        </div>
                        <div class="form-group txt4 ">
                            <label for="name">{{__('Rate')}}</label>
                            <input class="form-control txt4 " type="text" id="rate" name="rate" placeholder="{{__('Price')}}" required>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect txt4    " data-dismiss="modal">{{_('Cancel')}}</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light txt4  ">{{__('Update')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection
    
    @section('scripts')
    <script>
        $(document).ready(function(){
            $('.edit-btn').click(function(){
                let id = this.id;
                let name = $(this).attr('name');
                let code = $(this).attr('code');
                let rate = $(this).attr('rate');
                
                $('#name').val(name);
                $('#code').val(code);
                $('#rate').val(rate);

                 $('#updateForm').attr('action','{{route('vendor.coupan.update','')}}' +'/'+id);

            });
        });
    </script>

<script>
    $(document).ready(function(){
            $('#cat_id').on('change',function(){
                 let cat_id = $(this).val();
                 $.ajax({
                    url: "{{route('vendor.fetch_subcat')}}",
                    method: 'post',
                    data: {
                        id: cat_id
                    },
                    success: function(result){
                        console.log(result);
                        appendOptionsList(result,$('.sub_category'));
                    }
            });
        });
        function appendOptionsList(result,div) {
            div.empty();
            div.append('<option selected disabled>Select Sub-Category</option>');
            for (i=0;i<result.length;i++){
                div.append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
            }
        } 
    });


</script>
    @endsection