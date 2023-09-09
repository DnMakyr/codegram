@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-8 justify-content-evenly" style="object-fit: cover">
                <img src="/storage/{{ $post->image }}" alt="" class="w-100">
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div class="pe-3">
                            <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle w-100"
                                style="max-width: 50px;">
                        </div>
                        <div>
                            <div class="fw-bold"><a class=" text-decoration-none"
                                    href="/profile/{{ $post->user->id }}"><span
                                        class="text-dark">{{ $post->user->username }}</span></a> • <a
                                    class=" text-decoration-none" href="">Follow</a></div>
                        </div>
                    </div>
                    <hr>
                    <p><span class="fw-bold pe-2"><a class=" text-decoration-none"
                                href="/profile/{{ $post->user->id }}"><span
                                    class="text-dark">{{ $post->user->username }}</span></a></span>{{ $post->caption }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- {{$post->user->username}} --}}
