@extends('layouts.app')

@section('content')
    <div class="container pt-2 ps-3">
        <div class="row">
            <div class="col-7" style=" max-height: 705px">
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
            </div>
        </div>
    </div>
@endsection
