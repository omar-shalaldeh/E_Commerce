@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="card">
                <div class="card-header">
                    <img height="40" width="40" src="{{\Creativeorange\Gravatar\Facades\Gravatar::get($discussion->user->email)}}">
                    <strong>{{$discussion->user->name}}</strong>

                </div>

                <div class="card-body">
                    <h1 class="text-center">{{$discussion->slug}}</h1>
                    <strong>{!!$discussion->contents!!}</strong>

                </div>
            </div>
        @foreach($discussion->replies()->paginate(2) as $reply)


                @if($discussion->reply_id==$reply->id)
                <div class="card text-white bg-success my-1" >
                    <div class="card-header">
                        <h5 class="card-title"> <img src="{{Gravatar::get($reply->owner->email)}}" style="border-radius: 50%" height="40" width="40" alt="">
                            <span >{{$reply->owner->name}}</span></h5>
                      <strong class="float-right" style="margin-top: -50px;">Best Reply</strong></div>
                    <div class="card-body">
                        <p class="card-text">{!!$reply->content  !!}</p>
                    </div>
                </div>

                    @endif

            <div class="card my-2">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                        <img src="{{Gravatar::get($reply->owner->email)}}" style="border-radius: 50%" height="40" width="40" alt="">
                       <span>{{$reply->owner->name}}</span>

                        </div></div>
                </div>
                 <div class="card-body">
                     {!!$reply->content  !!}

                     @auth
                     @if(auth()->user()->id == $discussion->user_id)
                  <form method="post" action="{{route('mark-best.reply',['discussion'=>$discussion->id,'reply'=>$reply->id])}}">
                      @csrf
                      @if($discussion->reply_id!=$reply->id)
                     <button type="submit" class="btn btn-primary float-right my-1">Make to pest Reply</button>
                      @endif
                  </form>
                     @endif
                         @endauth
                </div>

            </div>




            @endforeach
        {{$discussion->replies()->paginate(2)->links()}}
    <div class="card card-default my-2">
        <div class="card-header">
            <strong class="text-center">Add A Reply</strong>
        </div>
        <div class="card-body">
            <form action="{{route('replies.store',$discussion->id)}}" method="post">
                @csrf
                @if(auth()->check())
                <div class="form-group">
                    <input id="content" value="Editor content goes here" type="hidden" name="contents">
                    <trix-editor input="content"></trix-editor>
                </div>
                <div class="form-group">

                    <button type="submit"  class="btn btn-primary float-right">Post</button>
                        @else
                        <a href="{{route('login')}}" class="btn btn-primary">Sign To Add Reply</a>

                        @endif

                </div>
            </form>

        </div>
    </div>
    </div>


@endsection
@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
@endsection
@section('script')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>


@endsection
