@extends('layouts.app')



@section('content')
    <div class="card">
        <div class="card-header">Notifications</div>
        <div class="card-body">
            <ul class="list-group">
                @auth
                    @foreach($notifications as $notification)

         @if($notification->type=='laravelforum\Notifications\NewReplyAdd')
        <li class="list-group-item">A new Reply Add to view Discussion <strong>{{$notification->data['discussion']['slug']}}</strong> <button class="btn btn-primary float-right btn-sm">View</button></li>
@endif

                @endforeach


                    {{$notifications->links()}}
                    @endauth
            </ul>


        </div>
    </div>






    @endsection