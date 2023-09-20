@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pt-5 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">Add New Post</div>
                    <div class="card-body">
                        <form action="/p" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="caption"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Post Caption') }}</label>
                                <div class="col-md-6">
                                    <input id="caption" type="text"
                                        class="form-control @error('caption') is-invalid @enderror" name="caption"
                                        caption="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>
                                    @error('caption')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Post Image') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                                    @error('image')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            @include('components.resizemodal')    

                            <div class="row pt-1 justify-content-center">
                                <button class="btn btn-primary btn-sm " style="width:20% ">Add New Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
