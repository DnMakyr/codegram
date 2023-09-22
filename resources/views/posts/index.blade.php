@extends('layouts.app')

@section('content')
    <div id="posts-container" class="container pt-5 ">
        <div class="row mb-4">
            <div class="col-md-7 mx-auto">
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="scrolling-pagination">
                            @foreach ($posts as $post)
                                <div class="card no-border-card">
                                    <div class="card-body post">
                                        <div class="d-flex align-items-center mb-3">
                                            <a href="/profile/{{ $post->user->id }}">
                                                <img src="/storage/{{ $post->user->profile->image }}"
                                                    class="rounded-circle me-2"
                                                    style="width: 32px; height: 32px; object-fit: cover">
                                            </a>
                                            <a href="/profile/{{ $post->user->id }}"
                                                class="text-decoration-none text-dark fw-bold">{{ $post->user->username }}</a>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center"
                                            style="max-height: 600px; ">
                                            <img src="/storage/{{ $post->image }}" alt="" class="img-fluid"
                                                style="border-radius: 3px ;max-height: 600px; max-width: 445px; object-fit: contain">
                                        </div>
                                        <div class="mt-4" id="likeContainer-{{ $post->id }}">
                                            <button class="btn btn-primary btn-sm likeButton"
                                                data-post-id="{{ $post->id }}"
                                                status="{{ $liked[$post->id] ? 'liked' : 'not-liked' }}">
                                                {{ $liked[$post->id] ? 'Liked' : 'Like' }}
                                            </button>
                                        </div>
                                        <div class="card-text d-flex" style="margin-top: 30px">
                                            <span class="me-1"><a href="/profile/{{ $post->user->id }}"
                                                    class="text-decoration-none text-dark fw-bold">{{ $post->user->username }}</a></span>
                                            <p>{{ $post->caption }}</p>
                                        </div>
                                        @if ($post->comments->count() > 2)
                                            <div>
                                                <a href="/p/{{ $post->id }}"
                                                    style="text-decoration: none; color: rgb(115, 108, 108)">View all
                                                    comments</a>
                                            </div>
                                        @else
                                            <div id="comments-container-{{ $post->id }}">
                                                @foreach ($post->comments as $comment)
                                                    <div class="comment d-flex">
                                                        <a class="text-dark" href="/profile/{{ $comment->user->id }}"
                                                            style="margin-right: 5px; font-weight: bold;
                                                    text-decoration: none">
                                                            {{ $comment->user->username }}</a>
                                                        {{ $comment->content }}
                                                        @if ($comment->user_id === auth()->user()->id || $post->user->id === auth()->user()->id)
                                                            <div class="dropdown"
                                                                style="position: absolute;
                                                            right: 0;">
                                                                <img src="{{ asset('icons/more.png') }}"
                                                                    class="dropdown-toggle" type="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                                    alt="">
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="comment-action dropdown-item"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editModal"
                                                                            data-comment-id="{{ $comment->id }}"
                                                                            data-post-id="{{ $post->id }}">Edit</a>
                                                                    </li>
                                                                    <li><a class="comment-action dropdown-item delete-comment-link"
                                                                            data-comment-id="{{ $comment->id }}">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div>
                                            <form class="commentForm" method="POST" autocomplete="off">
                                                @csrf
                                                <input id="content{{ $post->id }}" type="text" class="commentInput"
                                                    placeholder="Say something..." name="content" autofocus>
                                                <input type="hidden" id="post-id{{ $post->id }} " name="postId"
                                                    value="{{ $post->id }}">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-separator"></div>
                            @endforeach
                            <div class="row justify-content-center">
                                <div class="col-12" style="max-width: 100px; max-height: 100px">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                        {{-- @include('components.modal') --}}
                    </div>
                </div>
            </div>

            <div id="suggestion" class="col-4">
                <div class="suggestion-block" style="padding-right: 72px">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="{{ Auth::user()->profile->profileImage() }}" class="rounded-circle me-2"
                                    style="width: 44px; height: 44px; object-fit: cover">
                                <a href="/profile/{{ Auth::user()->id }}"
                                    class="text-decoration-none text-dark fw-bold">{{ Auth::user()->username }}</a>
                            </div>
                            <div style="margin-top: 15px;">
                                <p style="font-family: sans-serif; color:rgb(9, 106, 210); font-weight: bold">Suggestion</p>
                                @foreach ($suggests as $suggest)
                                    @if (!auth()->user()->following->contains($suggest->profile))
                                        <div>
                                            <div class="d-flex align-items-center" style="margin-top: 8px">
                                                <a href="/profile/{{ $suggest->id }}">
                                                    <img src="{{ $suggest->profile->profileImage() }}"
                                                        class="rounded-circle me-2"
                                                        style="width: 44px; height: 44px; object-fit: cover">
                                                </a>
                                                <a href="/profile/{{ $suggest->id }}"
                                                    class="text-decoration-none text-dark fw-bold">{{ $suggest->username }}</a>
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
