@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pt-5 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/profile/{{ $user->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title"
                                        value="{{ old('title') ?? ($user->profile->title ?? '') }}" autocomplete="title"
                                        autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description"
                                        value="{{ old('description') ?? ($user->profile->description ?? '') }}"
                                        autocomplete="description">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="url"
                                    class="col-md-4 col-form-label text-md-end">{{ __('URL') }}</label>

                                <div class="col-md-6">
                                    <input id="url" type="text" class="form-control" name="url"
                                        value="{{ old('url') ?? ($user->profile->url ?? '') }}" autocomplete="url">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Profile Image') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="image" name="image" data-bs-toggle="modal" data-bs-target="#cropModal">
                                </div>
                            </div>
                            @include('components.cropmodal')

                            <div class="row mb-0 justify-content-center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save Profile') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
