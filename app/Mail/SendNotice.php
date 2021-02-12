<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Notice;
use App\Teacher;
use App\User;

class SendNotice extends Mailable
{
    use Queueable, SerializesModels;

    public $notice,$teacher;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Notice $notice,Teacher $teacher)
    {
        $this->notice = $notice;
        $this->teacher = $teacher;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.notice_notification');
    }
}
