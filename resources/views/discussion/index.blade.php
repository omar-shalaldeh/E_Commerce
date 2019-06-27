@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($discussions as $discussion)

        <div class="card">
            <div class="card-header">
                <img class="img-fluid" height="40" width="40" src="{{\Creativeorange\Gravatar\Facades\Gravatar::get($discussion->user->email)}}">
                <strong class="text-center">{{$discussion->user->name}}</strong>
            <a href="{{route('discussion.show',$discussion->id)}}" class="btn btn-success btn-sm float-right">View</a>

            </div>

            <div class="card-body">
                <div class="text-center">
                    <strong>{{$discussion->title}}</strong>
                </div>

            </div>
        </div>
            @endforeach
        {{$discussions->appends(['channel'=>request()->query('channel')])->links()}}
    </div>


@endsection
