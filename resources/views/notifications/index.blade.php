    <div>
        <h3 style="text-align: center">Notifications</h3>
        <div class="row">
            <div class="card-body" style="height: 80vh; width:300px ;overflow-y: auto; justify-content: center; display: flex">
                <div class="col-10">
                    @foreach (auth()->user()->notifications as $notification)
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
                        @elseif ($notification->data['type'] === 'like')
                            <div class="card m-2">
                                <div class="card-body">
                                    <a class="link">{{ $notification->data['username'] }}</a> has liked <a
                                        href="/p/{{ $notification->data['post_id'] }}" class="link">your
                                        post</a>: {{ $notification->data['post_caption'] }}
                                </div>
                            </div>
                        @else
                            <div class="card m-2">
                                <div class="card-body">
                                    <a class="link">{{ $notification->data['username'] }}</a> has commented on
                                    <a href="/p/{{ $notification->data['post_id'] }}" class="link">your
                                        post</a>: {{ $notification->data['comment_content'] }}
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
