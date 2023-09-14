@extends('layouts.app') {{-- Assuming you have a layout file --}}
@section('content')
    <div class="container">
        <h1 style="font-weight: bold">Explore Users</h1>
        <div class="row pt-3">
            @foreach ($users as $user)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <a href="/profile/{{ $user->id }}""> <img src="{{ $user->profile->profileImage() }}" alt="{{ $user->username }}" class="card-img-top"
                            style="object-fit: contain"></a>
                        <div class="card-body">
                            <h5 class="card-title"><a href="/profile/{{ $user->id }}"
                                    style="text-decoration: none; color: black; font-weight: bold">{{ $user->username }}</a>
                            </h5>
                            <p class="card-text">{{ $user->profile->title }}</p>
                            <!-- Add more user information here -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
