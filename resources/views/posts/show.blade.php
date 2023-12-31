@extends('layouts.app')

@section('content')
    <div class="container pt-2 ps-3">
        <div class="row">
            <div class="col-7" style="max-height: 705px">
                <!-- Keep the image within the container and set max-width and max-height -->
                <img src="/storage/{{ $post->image }}" alt="" class="w-100"
                    style="max-width: 700px; max-height: 700px; object-fit: contain">
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
                                @if (!auth()->user()->following->contains($post->user->profile))
                                    • <a id="followText" class=" text-decoration-none" href="">Follow</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p><span class="fw-bold pe-2"><a class=" text-decoration-none"
                                href="/profile/{{ $post->user->id }}"><span
                                    class="text-dark">{{ $post->user->username }}</span></a></span>{{ $post->caption }}
                    </p>
                </div>
                <div id="comments-container-{{ $post->id }}" style="max-height: 80vh ;overflow-y: auto">
                    @foreach ($post->comments as $comment)
                        <div class="comment d-flex mb-2" >
                            <a><img src="/storage/{{ $comment->user->profile->image }}" class="rounded-circle me-2"
                                    style="width: 32px; height: 32px; object-fit: cover"></a>
                            <a class="text-dark" href="/profile/{{ $comment->user->id }}"
                                style="margin-right: 5px; font-weight: bold;
                                text-decoration: none">
                                {{ $comment->user->username }}</a>

                            {{ $comment->content }}
                            @if ($comment->user_id === auth()->user()->id || $post->user->id === auth()->user()->id)
                                <div class="dropdown" style="position: -webkit-sticky;
                            right: 0;">
                                    <img src="{{ asset('icons/more.png') }}" class="dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" alt="">
                                    <ul class="dropdown-menu">
                                        <li><a class="comment-action dropdown-item"
                                                href="/comment/{{ $comment->id }}/edit">Edit</a>
                                        </li>
                                        <li><a class="comment-action dropdown-item delete-comment-link"
                                                data-comment-id="{{ $comment->id }}" data-post-id="{{$post->id}}">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="interaction">
                    <form class="commentForm" method="POST" autocomplete="off">
                        @csrf
                        <input id="content{{ $post->id }}" type="text" class="commentInput"
                            placeholder="Say something..." name="content" autofocus>
                        <input type="hidden" id="post-id{{ $post->id }} " name="postId" value="{{ $post->id }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
