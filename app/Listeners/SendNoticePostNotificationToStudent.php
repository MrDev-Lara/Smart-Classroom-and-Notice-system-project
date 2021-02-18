<?php

namespace App\Listeners;

use App\Events\NoticePostByAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendAdminNotice;
use App\User;

class SendNoticePostNotificationToStudent implements ShouldQueue
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
     * @param  NoticePostByAdmin  $event
     * @return void
     */
    public function handle(NoticePostByAdmin $event)
    {
        $users = User::all();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new SendAdminNotice($event->notice));
        }
    }
}
