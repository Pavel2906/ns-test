<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class AnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'answer' => $this->answer,
            'user_id' => $this->user_id,
            'review_id' => $this->review_id,
            'created_at' => $this->created_at,
            'user' => $this->when($this->relationLoaded('user'), new UserResource($this->user)),
            'review' => $this->when($this->relationLoaded('review'), new ReviewResource($this->review)),
        ];
    }
}
