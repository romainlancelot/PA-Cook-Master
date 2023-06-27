<?php

namespace App\Events;

use App\Models\Conversations;
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

    public int $from_id;
    public int|null $to_id;
    public string $nickname;
    public string $message;
    public string $created_at;

    /**
     * Create a new event instance.
     */
    public function __construct(Conversations $conversation)
    {
        $this->from_id = $conversation->from_id;
        $this->to_id = $conversation->to_id;
        $this->nickname = $conversation->user->username;
        $this->message = $conversation->message;
        $this->created_at = $conversation->created_at->format('d/m H:i');
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
