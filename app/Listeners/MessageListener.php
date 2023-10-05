<?php

namespace App\Listeners;

use App\Events\Message as MessageEvent;
use App\Models\Message;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MessageListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MessageEvent $event): void
    {
        //
        Message::create([
            'sender' => $event->userId,
            'conversation_id' => $event->conversationId,
            'message' => $event->message
        ]);
    }
}
