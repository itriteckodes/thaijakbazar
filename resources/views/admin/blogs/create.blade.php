@extends('layout.admin')

@section('title')
   Add Blog
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header header-elements-inline">
                <h5 class="card-title txt4">Add Blog</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-12">
                   <div class="tile">
                      <div class="tile-body">
                         <form role="form" method="POST" action="{{route('admin.blog.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                               <div class="row">
                               <div class="form-group col-6">
                                <label for="image">Enter Title:</label>
                               <input type="text" name="title" class="form-control" placeholder="Ttile Here" required>   
                               </div>
                               <div class="form-group col-6">
                                   <label for="image">Insert Image:</label>
                               <input type="file" name="image" class="form-control" required>   
                               </div>
                               </div>
                               <div class="form-group">
                                 
                                  <textarea class="form-control txt4" name="description" id="tos" rows="10"></textarea>
                                  
                               </div>
                            </div>
                            <input type="hidden" name="country_id" value="{{Session::get('country_id')}}" required>

                            <div class="form-actions">
                               <button type="submit" class="btn btn-primary btn-block btn-lg txt4">Add Blog</button>
                            </div>
                         </form>
                      </div>
                   </div>
                </div>
             </div>

        </div>
    </div>
</div>
    
@endsection

@section('scripts')
<script src="{{asset('assets/nic-edit/nicEdit.js')}}" type="text/javascript"></script>
<script type="text/javascript">
  bkLib.onDomLoaded(function() {
    new nicEditor({iconsPath : '{{asset('assets/nic-edit/nicEditorIcons.gif')}}', fullPanel : true}).panelInstance('tos');
  });
</script>
@endsection
