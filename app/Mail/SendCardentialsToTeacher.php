<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Teacher;

class SendCardentialsToTeacher extends Mailable
{
    use Queueable, SerializesModels;

     public $teacher;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.teacher_cardential');
    }
}
