@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header" style="font-weight: bold; font-size:20px">
                        Conversation
                        <a href="/chat">
                            <button class="btn btn-primary float-end">
                                Return
                            </button>
                        </a>
                    </div>
                    <div class="card-body" style="height: 88vh; overflow-y: auto">
                        <div class="chat-box">
                            @foreach ($messages as $message)
                                <div class="mb-2 d-flex" style="width: 100%">
                                    <div class>
                                        <img src="{{ App\Models\User::find($message->sender)->profile->profileImage() }}"
                                            alt="" class="w-100 rounded-circle"
                                            style="max-width: 50px; max-height: 50px; object-fit: cover">
                                    </div>
                                    <div class="ms-3">
                                        <div class="fw-bold">
                                            @if ($message->sender === auth()->user()->id)
                                                You
                                            @else
                                                {{ App\Models\User::find($message->sender)->username }}
                                            @endif
                                        </div>
                                        <div>{{ $message->message }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <form class="d-flex" id="chatForm">
                                @csrf
                                <input id="btn-input" type="text" name="message" class="form-control" size="100"
                                    placeholder="Type your message here..." />
                                <input id="conversation_id" type="hidden" name="conversation_id"
                                    value="{{ $conversation_id }}">
                                <button class="btn btn-primary btn-sm ms-1" id="btn-chat">
                                    Send
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
