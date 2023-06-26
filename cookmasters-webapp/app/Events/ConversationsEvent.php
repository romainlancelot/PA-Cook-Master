<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ConversationsEvent implements ShouldBroadcast
{
    // use Dispatchable, InteractsWithSockets, SerializesModels;
    use Dispatchable, InteractsWithSockets;

    public string $nickname;
    public string $message;

    /**
     * Create a new event instance.
     */
    public function __construct(string $nickname, string $message)
    {
        $this->nickname = $nickname;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            // new PrivateChannel('App.User' . $this->message->to_id),
            new Channel('conversations'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'chat-message';
    }
}
