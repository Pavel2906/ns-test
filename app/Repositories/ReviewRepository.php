<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Review;
use App\Repositories\Interfaces\ReviewRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class ReviewRepository implements ReviewRepositoryInterface
{
    /**
     * @param Review $review
     */
    public function __construct(
       public readonly Review $review,
    ) {}

    /**
     * @param array $data
     * @return Review
     */
    public function create(array $data): Review
    {
        return $this->review::create($data);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return $this->review::with('user', 'answer.user')->paginate();
    }
}
