@extends('layouts.app')
@section('content')
    <div class="container pt-4" style="padding-left: 150px; padding-right: 110px">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ $user->profile->profileImage() }}" alt="" class="w-100 rounded-circle"
                    style="max-width: 150px; max-height: 150px; object-fit: cover">
            </div>

            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">

                    <h2>{{ $user->username }}</h2>
                    <div class="d-flex">
                        {{-- Friend Button --}}
                        @if (auth()->user() && auth()->user()->id !== $user->id)
                            @include('components.friendbutton')

                            {{-- Create Chat Button --}}
                        @endif
                        {{-- Follow Button --}}
                        <button id="followButton"
                            class="follow-button btn btn-primary btn-sm @if ($follows) following-button @endif dimmerHover"
                            style="display: @if (Auth::user() && Auth::user()->id === $user->id) none @endif;" user-id="{{ $user->id }}"
                            follows="{{ $follows ? 'true' : 'false' }}">
                            {{ $follows ? 'Following' : 'Follow' }}
                        </button>

                        <button id="chatButton"
                            class="ms-1 btn btn-primary btn-sm"style=" display: @if (Auth::user() && Auth::user()->id === $user->id) none @endif;">
                            <a href="/chat/{{ $user->id }}" style="color: white; text-decoration: none">Chat</a>
                        </button>

                        {{-- Add Post Button --}}
                        @can('update', $user->profile)
                            <a href="/p/create" class="btn btn-primary btn-sm " style="margin-right: 5px">Add New Post</a>
                        @endcan
                        {{-- Edit Profile Button --}}
                        @can('update', $user->profile)
                            <a href="/profile/{{ $user->id }}/edit" class="btn btn-primary btn-sm">Edit Profile</a>
                        @endcan
                    </div>
                </div>
                {{-- Statistic div --}}
                <div class="d-flex pt-2">
                    <div class="pe-3"><strong>{{ $postCount }}</strong> posts</div>
                    <div class="pe-3"><strong><span>{{ $followersCount }}</span></strong>
                        followers</div>

                    <div class="pe-3"><strong>{{ $followingCount }}</strong> following</div>
                </div>
                <div class="pt-3 fw-bold">{{ $user->profile->title ?? '' }}</div>
                <div>{{ $user->profile->description ?? '' }}</div>
                <div><a href="{{ $user->profile->url ?? '' }}">{{ $user->profile->url ?? '' }}</a></div>

            </div>
        </div>
        <hr>
        <div class="row p-2"></div>
        {{-- Posts of the user --}}
        <div class="row pt-4">
            @foreach ($user->posts as $post)
                <div class="col-4 p-1">
                    {{-- <a href="/p/{{ $post->id }} "><img src="/storage/{{ $post->image }}" alt=""
                            class=" me-1"
                            style="border-collapse: separate; height: 320px; width: 320px; object-fit: cover"></a> --}}

                    <a href="/p/{{ $post->id }} "><img src="/storage/{{ $post->image }}" alt=""
                            class=" me-1"
                            style="border-collapse: separate; height: 320px; width: 320px; object-fit: cover"></a>


                    <!-- Modal -->

                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
