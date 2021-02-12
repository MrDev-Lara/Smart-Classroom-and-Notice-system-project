<?php

namespace App\Listeners;

use App\Events\TeacherPostAnnouncement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendAnnouncement;

class SendAnnouncementNotification implements ShouldQueue
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
     * @param  TeacherPostAnnouncement  $event
     * @return void
     */
    public function handle(TeacherPostAnnouncement $event)
    {
        foreach ($event->room->users as $user) {
            Mail::to($user->email)->send(new SendAnnouncement($event->roompost,$event->room));
        }
    }
}
