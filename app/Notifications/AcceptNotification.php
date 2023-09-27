<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcceptNotification extends Notification
{
    use Queueable;
    public $user;
    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        //
        $this->user = $user;
    }
    public function via(object $notifiable): array
    {
        return ['database'];
    }

   
    public function toArray(object $notifiable): array
    {
        return [
            //
            'user_id'=> $this->user->id,
            'username'=> $this->user->username,
            'action'=> 'accept',
            'type'=> 'friend',
        ];
    }
}
