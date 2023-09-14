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
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="/storage/{{ $post->user->profile->image }}"
                                                class="rounded-circle me-2" style="width: 32px; height: 32px; object-fit: cover">
                                            <a href="/profile/{{ $post->user->id }}"
                                                class="text-decoration-none text-dark fw-bold">{{ $post->user->username }}</a>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center"
                                            style="max-height: 600px; ">
                                            <img src="/storage/{{ $post->image }}" alt="" class="img-fluid"
                                                style="border-radius: 3px ;max-height: 600px; max-width: 445px; object-fit: contain">
                                        </div>
                                        <div class="card-text d-flex" style="margin-top: 30px">
                                            <span class="me-1"><a href="/profile/{{ $post->user->id }}"
                                                    class="text-decoration-none text-dark fw-bold">{{ $post->user->username }}</a></span>
                                            <p>{{ $post->caption }}</p>
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
                    </div>
                </div>
            </div>

            <div id="suggestion" class="col-4">
                <div class="suggestion-block" style="padding-right: 72px">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="/storage/{{ Auth::user()->profile->image }}" class="rounded-circle me-2"
                                    style="width: 44px; height: 44px; object-fit: cover">
                                <a href="/profile/{{ Auth::user()->id }}"
                                    class="text-decoration-none text-dark fw-bold">{{ Auth::user()->username }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
