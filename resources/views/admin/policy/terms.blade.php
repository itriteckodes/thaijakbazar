@extends('layout.admin')

@section('title')
   Terms & Condition
@endsection

@section('content')
@php($terms = App\Models\Policy::where('key','terms')->where('country_id',Session::get('country_id'))->first())

<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">

            <div class="card-header header-elements-inline">
                <h5 class="card-title txt4">Update Terms & Condition</h5>
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
                         <form role="form" method="POST" action="{{route('admin.save_terms')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                               
                               <div class="form-group">
                                 
                                  <textarea class="form-control txt4" name="terms" id="tos" rows="10">{{$terms->data}}</textarea>
                                  
                               </div>
                            </div>
                            <div class="form-actions">
                               <button type="submit" class="btn btn-primary btn-block btn-lg txt4">Update</button>
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
