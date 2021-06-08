@extends('layout.admin')


@section('title')
Add slider Images
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">

        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add Slider Images</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 txt4">
                            <label>Image</label>
                            <input name="image" type="file" class="form-control txt4" placeholder="Enter image" required>
                        </div>
                        <div class="col-md-6 txt4">
                            <label>Title</label>
                            <input name="title" type="text" class="form-control txt4" placeholder="Enter title" required>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-6 txt4">
                            <label>Text</label>
                            <input name="text" type="text" class="form-control txt4" placeholder="Enter text" required>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary txt4">Save <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="card">

    <table class="table datatable-save-state datatable-responsive">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Text</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\Slider::all() as $key=> $slider)
            <tr class="txt4">

                <td>{{$key+1}}</td>
                <td><img src="{{asset($slider->image)}}" alt="image" height="90" width="90"></td>
                <td>{{$slider->title}}</td>
                <td>{{$slider->text}}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-outline-danger waves-effect waves-themed deleteBtn txt4" data-toggle="modal" data-target="#delete_modal" id="{{$slider->id}}">
                        <span class="fal fa-times mr-1"></span>
                        Delete
                    </button>
                </td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="deleteForm" method="POST">
                @method('DELETE')
                @csrf
            <div class="modal-header">
                <h4 class="modal-title txt4">
                    Warning
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body txt4">
                Are you sure?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary txt4" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger txt4">Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
  <script>
      $(document).ready(function(){
        $('body').on('click', '.deleteBtn', function(){
            let id = $(this).attr('id'); 
            $('#id').val(id);
            $('#deleteForm').attr('action','{{route('admin.slider.destroy','')}}' +'/'+id);
        });

      });
      
  </script>  
@endsection