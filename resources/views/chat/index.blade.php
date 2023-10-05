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
                                    <img src=" @if ($conversation->participant_1 === auth()->user()->id) {{ App\Models\User::find($conversation->participant_2)->profile->profileImage() }} 
                                        @else 
                                        {{ App\Models\User::find($conversation->participant_1)->profile->profileImage() }} @endif"
                                        alt="" class="w-100 rounded-circle"
                                        style="max-width: 50px; max-height: 50px; object-fit: cover">
                                    <a href="/chat/load/{{$conversation->id}}" class="ms-3 fw-bold conversation-link"
                                        data-conversation-id="{{ $conversation->id }}"
                                        data-channel-name="channel-{{ $conversation->id }}"
                                        data-auth-id={{ auth()->user()->id }} style="text-decoration: none; color: black">
                                        @if ($conversation->participant_1 === auth()->user()->id)
                                            {{ App\Models\User::find($conversation->participant_2)->username }}
                                        @else
                                            {{ App\Models\User::find($conversation->participant_1)->username }}
                                        @endif
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
