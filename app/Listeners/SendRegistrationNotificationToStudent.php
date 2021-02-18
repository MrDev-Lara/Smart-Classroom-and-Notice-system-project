<?php

namespace App\Listeners;

use App\Events\StudentRegistration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCardentialsToStudent;

class SendRegistrationNotificationToStudent implements ShouldQueue
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
     * @param  StudentRegistration  $event
     * @return void
     */
    public function handle(StudentRegistration $event)
    {
        Mail::to($event->user->email)->send(new SendCardentialsToStudent($event->user));
    }
}
