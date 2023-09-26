@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header" style="font-weight: bold; font-size: 20px">Chat</div>
                    <div class="card-body" style="height: 95vh">
                        @foreach ($conversations as $conversation)
                            <div class="mb-2 d-flex">
                                <img class="rounded-circle me-3" src="{{$friend->profile->profileImage()}}" style="max-width: 50px">
                                <p class="mt-3" style="font-weight: bold">{{$friend->username}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-header" style="font-weight: bold; font-size:20px">Conversation</div>
                    <div class="card-body" style="height: 88vh">
                        @include('chat.receiver')
                        @include('chat.sender')
                    </div>
                    <div class="card-footer">
                        @include('chat.chatform')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
