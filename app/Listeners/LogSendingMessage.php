<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Queue\InteractsWithQueue;
use App\Email;

class LogSendingMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageSending  $event
     * @return void
     */
    public function handle(MessageSending $event)
    {
        // $email=[
        //     'uuid'=> $event->data['order']->uuid,
        //     'sender'=> $event->data['order']->sender,
        //     'to'=> $event->data['order']->to,
        //     'status'=> 'sending',
        // ];
        // Email::create($email);
    }
}
