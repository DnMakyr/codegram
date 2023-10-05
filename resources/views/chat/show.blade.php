    @extends('layouts.app')

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header"
                            style="font-weight: bold; font-size:20px; align-items: center; justify-content: space-between; display:flex; flex-direction: row">
                            <div>
                                <img class="rounded-circle" src="{{ $replier->profile->profileImage() }}" alt=""
                                    style="max-width: 55px; object-fit:cover"> {{ $replier->username }}
                            </div>

                            <button class="connect-button btn float-end text-white" style="background-color: rgb(15, 207, 95)"
                                data-conversation-id={{ $conversationId }}>
                                Connect
                            </button>

                            <button class="return-button btn btn-primary float-end"
                                data-conversation-id={{ $conversationId }}>
                                Return
                            </button>
                        </div>
                        <div class="card-body" id="chat-container">
                            <div class="chat-box" id="chat-box">
                                <div class="messages">
                                @include('chat.broadcast', ['message'=>'Connect to start your conversation'])
                                @if ($messages->count() > 0)
                                    @foreach ($messages as $message)
                                        @if ($message->sender === auth()->user()->id)
                                            @include('chat.broadcast', ['message'=>$message->message])
                                        @else
                                            @include('chat.receiver', ['message'=>$message->message])
                                        @endif
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="input-group">
                                <form class="d-flex" id="chatForm" autocomplete="off">
                                    <input type="text" id="message" name="message" class="form-control" size="100"
                                        placeholder="Type your message here..." />
                                    <input id="conversation_id" type="hidden" name="conversation_id"
                                        value="{{ $conversationId }}">
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
