@extends('layouts.app')

@section('content')
    <div class="container pt-2 ps-3">
        <div class="row">
            <div class="col-7" style="max-height: 705px">
                <!-- Keep the image within the container and set max-width and max-height -->
                <img src="/storage/{{ $post->image }}" alt="" class="w-100"
                    style="max-width: 705px; max-height: 705px; object-fit: cover">
            </div>
            <div class="col-5">
                <div>
                    <div class="d-flex align-items-center">
                        <div class="pe-2">
                            <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle w-100"
                                style="width: 32px; height:32px; object-fit: cover">
                        </div>
                        <div>
                            <div class="fw-bold"><a class=" text-decoration-none"
                                    href="/profile/{{ $post->user->id }}"><span
                                        class="text-dark">{{ $post->user->username }}</span></a>
                                  • <a id="followText" class=" text-decoration-none" href="">Follow</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p><span class="fw-bold pe-2"><a class=" text-decoration-none"
                                href="/profile/{{ $post->user->id }}"><span
                                    class="text-dark">{{ $post->user->username }}</span></a></span>{{ $post->caption }}
                    </p>
                </div>
                <div  id="comments-container">

                    @foreach ($post->comments as $comment)
                        <div class="comment d-flex mb-2">
                            <a><img src="/storage/{{ $comment->user->profile->image }}" class="rounded-circle me-2"
                                    style="width: 32px; height: 32px; object-fit: cover"></a>
                            <a class="text-dark" href="/profile/{{ $comment->user->id }}"
                                style="margin-right: 5px; font-weight: bold;
                                text-decoration: none">
                                {{ $comment->user->username }}</a>

                            {{ $comment->content }}
                        </div>
                    @endforeach

                </div>
                <div class="interaction">
                    <form method="POST" autocomplete="off">
                        @csrf
                        <input id="content" type="text" class="comment form-control" size="60" placeholder="Say something..." name="content"
                            autofocus>
                        <input type="hidden" name="postId" value="{{ $post->id }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
