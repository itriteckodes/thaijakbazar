@extends('layout.admin')

@section('title')
    Manage News Shown To Vendor
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title txt4">Manage News Shown To Vendor</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.news-ticker.update',Session::get('country_id'))}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="txt4">News</label>
                            <textarea name="news" class="form-control">{{ $newsticker->news }}</textarea>
                        </div>

                        <div class="text-right col-md-2">
                            <button type="submit" class="form-control btn btn-primary txt4">Upate
                                <i class="icon-plus22 ml-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>

@endsection
