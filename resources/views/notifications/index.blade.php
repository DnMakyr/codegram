@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Notifications</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="height: 80vh">
                        <div class="col-12 d-flex">
                            <div class="col-4">
                                <h5 class="text-center">Friends</h5>
                                @foreach ($notifications as $notification)
                                    @if ($notification->data['type'] === 'friend')
                                        <div class="card m-2">
                                            <div class="card-body">
                                                <a href="/profile/{{ $notification->data['user_id'] }}"
                                                    class="link">{{ $notification->data['username'] }}</a>
                                                @if ($notification->data['action'] === 'request')
                                                    wants to be your friend
                                                @else
                                                    accepted your request
                                                @endif

                                                <img class="float-end" src="{{ asset('/icons/more.png') }}" alt="">
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-4">
                                <h5 class="text-center">Likes</h5>
                                @foreach ($notifications as $notification)
                                    @if ($notification->data['type'] === 'like')
                                        <div class="card m-2">
                                            <div class="card-body">
                                                <a class="link">{{ $notification->data['username'] }}</a> has liked <a
                                                    href="/p/{{ $notification->data['post_id'] }}" class="link">your
                                                    post</a>: {{ $notification->data['post_caption'] }}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-4">
                                <h5 class="text-center">Comments</h5>
                                @foreach ($notifications as $notification)
                                    @if ($notification->data['type'] === 'comment')
                                        <div class="card m-2">
                                            <div class="card-body">
                                                <a class="link">{{ $notification->data['username'] }}</a> has commented on
                                                <a href="/p/{{ $notification->data['post_id'] }}" class="link">your
                                                    post</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
