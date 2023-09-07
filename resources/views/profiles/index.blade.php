@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row ">
            <div class="col-3 p-5">
                <img src="{{ $user->profile->profileImage()}}"
                    alt="" class="rounded-circle w-100" style="">
            </div>

            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h2>{{ $user->username }}</h2>
                    <div class="d-flex">
                        <div><follow-button></div>
                        @can('update', $user->profile)
                        <a href="/p/create" class="btn btn-primary btn-md " style="margin-right: 5px">Add New Post</a>
                        @endcan

                        @can('update', $user->profile)
                        <a href="/profile/{{ $user->id }}/edit" class="btn btn-primary btn-md">Edit Profile</a>
                        @endcan
                    </div>
                </div>
                <div class="d-flex pt-2">
                    <div class="pe-3"><strong>{{ $user->posts->count() }}</strong> posts</div>
                    <div class="pe-3"><strong>23k</strong> followers</div>
                    <div class="pe-3"><strong>212</strong> following</div>
                </div>
                {{-- @if ($user->profile) --}}
                <div class="pt-3 fw-bold">{{ $user->profile->title ?? '' }}</div>
                <div>{{ $user->profile->description ?? '' }}</div>
                <div><a href="{{ $user->profile->url ?? '' }}">{{ $user->profile->url ?? '' }}</a></div>
                {{-- @else --}}
                {{-- <div class="pt-3 fw-bold">No profile available</div> --}}
                {{-- @endif    --}}
            </div>
        </div>
        <div class="row pt-4">
            @foreach ($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/p/{{ $post->id }} "><img src="/storage/{{ $post->image }}" alt=""
                            class="w-100 pe-2" style=""></a>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection