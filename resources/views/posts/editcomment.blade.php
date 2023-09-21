@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pt-5 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/comment/edit/{{ $comment->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label for="newComment"
                                    class="col-md-4 col-form-label text-md-end">{{ __('New Comment:') }}</label>

                                <div class="col-md-6">
                                    <input id="content" type="text" class="form-control" name="content"
                                        value="{{ old('comment') ?? $comment->content }}" autocomplete="description">
                                    <input type="hidden" id="postId" name="post-id" value={{ $comment->post->id }}>
                                    <input type="hidden" id="commentId" name="comment-id" value={{ $comment->id }}>
                                </div>
                            </div>

                            <div class="row mb-0 justify-content-center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save Changes') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
