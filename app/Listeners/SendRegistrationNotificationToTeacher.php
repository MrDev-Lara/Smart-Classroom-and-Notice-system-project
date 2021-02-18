<?php

namespace App\Listeners;

use App\Events\TeacherRegistration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCardentialsToTeacher;

class SendRegistrationNotificationToTeacher implements ShouldQueue
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
     * @param  TeacherRegistration  $event
     * @return void
     */
    public function handle(TeacherRegistration $event)
    {
        Mail::to($event->teacher->email)->send(new SendCardentialsToTeacher($event->teacher));
    }
}
