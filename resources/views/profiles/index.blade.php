@extends('layouts.app')
@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ $user->profile->profileImage() }}" alt="" class="rounded-circle w-100" style="">
            </div>

            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">

                    <h2>{{ $user->username }}</h2>
                    <div class="d-flex">
                        {{-- Follow Button --}}
                        <button id="followButton" class="follow-button btn btn-primary btn-md no-focus-outline"
                            onclick="toggleFollow()" user-id="{{ $user->id }}"
                            follows="{{ $follows ? 'true' : 'false' }}"
                            @if (Auth::user() && Auth::user()->id === $user->id) style="display: none" @endif>
                            {{ $follows ? 'Following' : 'Follow' }}
                        </button>
                        {{-- Add Post Button --}}
                        @can('update', $user->profile)
                            <a href="/p/create" class="btn btn-primary btn-md " style="margin-right: 5px">Add New Post</a>
                        @endcan
                        {{-- Edit Profile Button --}}
                        @can('update', $user->profile)
                            <a href="/profile/{{ $user->id }}/edit" class="btn btn-primary btn-md">Edit Profile</a>
                        @endcan
                    </div>
                </div>
                {{-- Statistic div --}}
                <div class="d-flex pt-2">
                    <div class="pe-3"><strong>{{ $user->posts->count() }}</strong> posts</div>
                    <div class="pe-3"><strong><span>{{ $user->profile->followers->count() }}</span></strong>
                        followers</div>

                    <div class="pe-3"><strong>{{ $user->following->count() }}</strong> following</div>
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
        <hr>
        <div class="row p-2"></div>
        <div class="row pt-4">
            @foreach ($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/p/{{ $post->id }} "><img src="/storage/{{ $post->image }}" alt=""
                            data-bs-toggle="modal" data-bs-target="#postModalLabel" class="w-100 me-2"
                            style="border-radius: 8px; border-collapse: separate; height: 416px; width:416px; object-fit: cover"></a>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
