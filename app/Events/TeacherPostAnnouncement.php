<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Roompost;
use App\Room;

class TeacherPostAnnouncement
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $roompost,$room;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Roompost $roompost,Room $room)
    {
        $this->roompost = $roompost;
        $this->room = $room;
    }

}
