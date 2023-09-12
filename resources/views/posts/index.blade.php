@extends('layouts.app')

@section('content')
    <div id="posts-container" class="container pt-5">
        <div class="scrolling-pagination">
            @foreach ($posts as $post)
                <div class="row mb-4 justify-content-center">
                    <div class="col-4 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle me-2"
                                        style="width: 30px; height: 30px;">
                                    <a href="/profile/{{ $post->user->id }}"
                                        class="text-decoration-none text-dark fw-bold">{{ $post->user->username }}</a>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-center align-items-center"
                                    style="max-height: 400px; background-color: #f0f0f0;">
                                    <img src="/storage/{{ $post->image }}" alt="" class="img-fluid"
                                        style="max-height: 400px; max-width: 100%; height: auto; width: auto;">
                                </div>
                                <hr>
                                <div class="card-text mt-2 d-flex">
                                    <span class="me-1"><a href="/profile/{{ $post->user->id }}"
                                            class="text-decoration-none text-dark fw-bold">{{ $post->user->username }}</a></span>
                                    <p>{{ $post->caption }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row justify-content-center">
                <div class="col-12" style="max-width: 100px; max-height: 100px">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
