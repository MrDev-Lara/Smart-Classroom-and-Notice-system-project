<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Notice;
use App\Teacher;
use App\User;

class NoticeAnnouncement
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $notice,$teacher,$user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Notice $notice,Teacher $teacher)
    {
        $this->notice = $notice;
        $this->teacher = $teacher; 
        
    }

}
