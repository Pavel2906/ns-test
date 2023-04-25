<?php

declare(strict_types=1);

namespace App\Events;

use App\Http\Resources\AnswerResource;
use App\Models\Answer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AnswerCreatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly Answer $answer
    ) {}

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('answer' . $this->answer->review->user_id),
        ];
    }

    /**
     * @return string
     */
    public function broadcastAs(): string
    {
        return 'review.answered';
    }

    /**
     * @return AnswerResource[]
     */
    public function broadcastWith(): array
    {
        return [
            'data' => new AnswerResource($this->answer)
        ];
    }
}
