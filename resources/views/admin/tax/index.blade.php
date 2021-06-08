@extends('layout.admin')

@section('title')
    Tax Values
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title txt4">Set Tax Values</h5>
            </div>

            <div class="card-body">
                <form action="{{route('admin.tax.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @foreach ($values as $value)
                        <div class="form-group col-md-6">
                            <label for="fare"><b>{{ $value->slug }}</b></label>
                            <input class="form-control" name="values[{{$value->id}}]" type="number" placeholder="Value" value="{{ $value->value }}"
                                required>
                        </div>
                        @endforeach
                        
                            <button type="submit" class="form-control btn btn-primary txt4">Set Values
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

