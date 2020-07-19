<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use App\Email;

class LogSentMessage
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
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        // dd($event);
        // $uuid = $event->data['order']->uuid;
        // echo $uuid;
        // $email = Email::find($uuid);
        // dd($email);
        // $email->status = 'sent';
        // $email->save();

        $email=[
            'uuid'=> $event->data['order']->uuid,
            'sender'=> $event->data['order']->sender,
            'to'=> $event->data['order']->to,
            'status'=> 'sent',
        ];
        Email::create($email);
    }
}
