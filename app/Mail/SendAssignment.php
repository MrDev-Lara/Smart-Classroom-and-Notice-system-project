<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Assignment;
use App\Room;

class SendAssignment extends Mailable
{
    use Queueable, SerializesModels;

    public $assignment,$room;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Assignment $assignment,Room $room)
    {
        $this->assignment = $assignment;
        $this->room = $room;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.assignment_notification');
    }
}
