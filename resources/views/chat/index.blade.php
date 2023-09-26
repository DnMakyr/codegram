@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header" style="font-weight: bold; font-size: 20px">Chat</div>
                    <div class="card-body" style="height: 95vh">
                        @foreach ($conversations as $conversation)
                            <div class="mb-2 d-flex" style="text-align: center">
                                <div>
                                    @if ($conversation->participant_1 === auth()->user()->id)
                                        <img src="{{ App\Models\User::find($conversation->participant_2)->profile->profileImage() }}"
                                            alt="" class="w-100 rounded-circle"
                                            style="max-width: 50px; max-height: 50px; object-fit: cover">
                                        <a href="/chat/load/{{ $conversation->id }}" class="ms-3 fw-bold conversation-link"
                                            style="text-decoration: none; color: black">{{ App\Models\User::find($conversation->participant_2)->username }}</a>
                                    @else
                                        <img src="{{ App\Models\User::find($conversation->participant_1)->profile->profileImage() }}"
                                            alt="" class="w-100 rounded-circle"
                                            style="max-width: 50px; max-height: 50px; object-fit: cover">
                                        <a href="/chat/load/{{ $conversation->id }}" class="ms-3 fw-bold"
                                            style="text-decoration: none; color: black">{{ App\Models\User::find($conversation->participant_1)->username }}</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
