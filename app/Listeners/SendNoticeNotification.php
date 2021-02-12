<?php

namespace App\Listeners;

use App\Events\NoticeAnnouncement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNotice;
use App\User;

class SendNoticeNotification implements ShouldQueue
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
     * @param  NoticeAnnouncement  $event
     * @return void
     */
    public function handle(NoticeAnnouncement $event)
    {
        $users = User::all();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new SendNotice($event->notice,$event->teacher));
        }
    }
}
