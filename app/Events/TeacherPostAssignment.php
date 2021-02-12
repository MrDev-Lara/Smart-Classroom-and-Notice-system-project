<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Assignment;
use App\Room;

class TeacherPostAssignment
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

     public $assignment,$room;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Assignment $assignment,Room $room)
    {
        $this->assignment = $assignment;
        $this->room = $room;
    }

}
