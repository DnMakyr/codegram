@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-6">
                            <form method="GET" class="d-flex">
                                <img src="{{ asset('icons/search.png') }}" class=" me-3" style="object-fit: contain">
                                <input id="searchText" type="text" placeholder="Enter a username..." class="form-control"
                                    name="searchText" value="{{ old('searchText') }}" autofocus>
                                <button class="btn btn-primary ms-2" id="searchButton">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @if ($searchText !== null)
                        <div class="col-6" id="searchResults">
                            @if ($results !== null && count($results) == 0)
                                <div class="text-center">
                                    <h3>No results found for "{{ $searchText }}"</h3>
                                </div>
                            @else                                
                            @foreach ($results as $result)
                                <div class="">
                                    <a href="/profile/{{ $result->id }}" class="text-decoration-none text-dark">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $result->profile->profileImage() }}" class="rounded-circle me-2"
                                                style="width: 32px; height: 32px; object-fit: cover">
                                            <span class="fw-bold">{{ $result->username }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
