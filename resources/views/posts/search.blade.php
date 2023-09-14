@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-sm-6 d-flex">
                                <img src="{{ asset('icons/search.png') }}" class=" me-3" style="object-fit: contain">
                                <input id="searchText" type="text" placeholder="Enter a username..."
                                    class="form-control" name="searchText"
                                    value="{{ old('searchText') }}" autofocus>
                            </div>
                        </div>
                        <div class="row pt-1 justify-content-center">
                            {{-- @foreach
                                
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
