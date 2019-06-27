@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-end my-1">
            <a href="{{route('discussion.create')}}" class="btn btn-primary">Add Discussion</a>
        </div>
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>


@endsection
