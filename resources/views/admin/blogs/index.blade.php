@extends('layout.admin')

@section('title')
All Blogs

@endsection

@section('content')
    <div class="card">

        <table class="table datatable-save-state table-responsive">
            <thead>
                <tr>
                    <th></th>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $key => $blog)
                <tr>
                    <td></td>
                    <td>{{$key+1}}</td>
                    <td><img src="{{asset($blog->image)}}"  height="80px" width="80px" alt=""></td>
                    <td>{{$blog->title}}</td>
                    <td> <form action="{{route('admin.blog.destroy',$blog->id)}}" method="POST">
                        @method('DELETE')
                        <button type="submit" class=" btn btn-danger txt4"><i class="icon-trash"></i> Delete</button>
                    </form></td>
                    <td></td>
                </tr>
                @endforeach
                
               
            </tbody>
        </table>
    </div>
    @endsection
