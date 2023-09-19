@extends('layouts.app') {{-- Assuming you have a layout file --}}
@section('content')
    <div class="container">
        <h1 style="font-weight: bold">Explore Users</h1>
        <div class="row pt-3">
            {{-- <div class="scrolling-pagination"> --}}
            @foreach ($users as $user)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <a href="/profile/{{ $user->id }}""> <img src="{{ $user->profile->profileImage() }}"
                                alt="{{ $user->username }}" class="card-img-top" style="object-fit: contain"></a>
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div style="flex-grow: 1;">
                                    <h5 class="card-title">
                                        <a href="/profile/{{ $user->id }}"
                                            style="text-decoration: none; color: black; font-weight: bold">
                                            {{ $user->username }}
                                        </a>
                                    </h5>
                                    <p class="card-text">{{ $user->profile->title }}</p>
                                </div>
                                <div class="ml-auto">
                                    @if (auth()->user()->isFriendWith($user))
                                        {{-- Already friends, show the "Remove Friend" button --}}

                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Friend
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="friend-action dropdown-item"
                                                        href="/unfriend/{{ $user->id }}"
                                                        user-id="{{ $user->id }}">Unfriend</a></li>
                                            </ul>
                                        </div>
                                    @elseif (auth()->user()->hasFriendRequestFrom($user))
                                        {{-- Friend request received, show the "Accept" and "Decline" buttons --}}
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="friend-action dropdown-item"
                                                        href="/accept/{{ $user->id }}"
                                                        user-id="{{ $user->id }}">Accept</a></li>
                                                <li><a class="friend-action dropdown-item"
                                                        href="/decline/{{ $user->id }}"
                                                        user-id="{{ $user->id }}">Decline</a></li>
                                            </ul>
                                        </div>
                                    @elseif (auth()->user()->hasSentFriendRequestTo($user))
                                        {{-- Friend request sent, show the "Cancel Request" button --}}
                                        <a href="/cancel/{{ $user->id }}">
                                        <button class="btn btn-warning cancelButton"
                                            user-id="{{ $user->id }}">Cancel</button>
                                        </a>
                                    @else
                                        {{-- Not friends, show the "Add Friend" button --}}

                                      <button class="btn btn-primary addButton"
                                            user-id="{{ $user->id }}">Add
                                            Friend</button>
                                    
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
            <div class="row justify-content-center">
                <div class="col-12" style="max-width: 100px; max-height: 100px">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
