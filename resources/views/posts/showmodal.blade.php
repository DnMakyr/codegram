@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="modal fade" id="post-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="false">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-8 justify-content-evenly">
                                    <img src="/storage/{{ $post->image }}" alt="" class="fluid"
                                        style=" object-fit: contain">
                                </div>
                                <div class="col-4">
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="pe-3">
                                                <img src="/storage/{{ $post->user->profile->image }}"
                                                    class="rounded-circle w-100" style="max-width: 50px;">
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
                                                        class="text-dark">{{ $post->user->username }}</span></a></span>{{ $post->caption }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
