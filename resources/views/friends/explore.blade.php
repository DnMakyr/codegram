@extends('layouts.app') {{-- Assuming you have a layout file --}}
@section('content')
    <div class="container">
        <h1>Explore Users</h1>
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
                                @include('components.friendbutton')
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
