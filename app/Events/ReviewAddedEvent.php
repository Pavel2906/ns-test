<?php

declare(strict_types=1);

namespace App\Events;

use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReviewAddedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly Review $review
    ) {}

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('review'),
        ];
    }

    /**
     * @return string
     */
    public function broadcastAs(): string
    {
        return 'review.added';
    }

    /**
     * @return ReviewResource[]
     */
    public function broadcastWith(): array
    {
        return [
            'data' => new ReviewResource($this->review)
        ];
    }
}
