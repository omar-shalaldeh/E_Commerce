@extends('layouts.app')
@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
    @endsection
@section('content')
    <div class="container">

        <div class="card my-2">
            <div class="card-header">Add Discussion</div>

            <div class="card-body">
                <form  action="{{route('discussion.store')}}" method="post">
                    @Csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <input id="content" value="Editor content goes here" type="hidden" name="contents">
                        <trix-editor input="content"></trix-editor>

                    </div>
                    <div class="form-group">
                        <label for="channel">Channel</label>
                        <select name="channel" class="form-control">
                            @foreach($channels as $channel)
                                <option value="{{$channel->id}}">{{$channel->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group  justify-content-end">

                        <input class="btn btn-success" type="submit" value="Create" class="form-control">
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
@section('script')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>


@endsection