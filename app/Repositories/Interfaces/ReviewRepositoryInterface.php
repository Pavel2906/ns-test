<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Models\Review;
use Illuminate\Pagination\LengthAwarePaginator;

interface ReviewRepositoryInterface {
    /**
     * @param array $data
     * @return Review
     */
    public function create(array $data): Review;

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator;
}
