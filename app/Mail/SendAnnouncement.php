<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Roompost;
use App\Room;

class SendAnnouncement extends Mailable
{
    use Queueable, SerializesModels;

     public $roompost,$room;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Roompost $roompost,Room $room)
    {
        $this->roompost = $roompost;
        $this->room = $room;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.announcement_notification');
    }
}
