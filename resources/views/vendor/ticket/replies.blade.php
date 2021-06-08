@extends('layout.vendor')

@section('title')
    {{$ticket->ticket}}
@endsection

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title txt4">{{__('Replies')}}</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <ul class="media-list media-chat media-chat-scrollable mb-3">

            @foreach ($replies as $reply)

            @if ($reply->type == 'vendor')
            <li class="media">
                <div class="mr-3">
                    <a href="../../../../global_assets/images/placeholders/placeholder.jpg">
                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="40" height="40" alt="">
                    </a>
                    
                </div>

                <div class="media-body">
                    <div class="media-chat-item">{{$reply->message}}</div>
                    <div class="font-size-sm text-muted mt-2">{{$reply->created_at->diffForHumans()}}</div>
                </div>
            </li>

            @else
            <li class="media media-chat-item-reverse">
                <div class="media-body">
                    <div class="media-chat-item">{{$reply->message}}</div>
                    <div class="font-size-sm text-muted mt-2">{{$reply->created_at->diffForHumans()}}</div>
                </div>

                <div class="ml-3">
                    <a href="../../../../global_assets/images/placeholders/placeholder.jpg">
                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="40" height="40" alt="">
                    </a>
                    <br>
                    <p>{{$reply->admin->name}}</p>
                </div>
            </li>

            @endif
                
            @endforeach
            

            

        </ul>
        <form class="formloader" action="{{route('vendor.reply.store')}}" method="POST">
            @csrf
            <textarea name="message" class="form-control mb-3" rows="3" cols="1" placeholder="Enter your message..." required></textarea>
            <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
            <div class="d-flex align-items-center">
                <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-auto"><b><i class="icon-paperplane"></i></b> {{__('Send')}}</button>
            </div>
            <input type="hidden" name="country_id" value="{{Auth::user()->country_id}}" required>

        </form>
        
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        
        $('.formloader').on('submit',function(){
            $('.preloader').show();
        })
    });
</script>
@endsection
