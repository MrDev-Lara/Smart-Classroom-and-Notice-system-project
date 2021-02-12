<?php

namespace App\Listeners;

use App\Events\TeacherPostAssignment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendAssignment;

class SendAssignmentNotification implements ShouldQueue
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
     * @param  TeacherPostAssignment  $event
     * @return void
     */
    public function handle(TeacherPostAssignment $event)
    {
        foreach ($event->room->users as $user) {
            Mail::to($user->email)->send(new SendAssignment($event->assignment,$event->room));
        }
    }
}
