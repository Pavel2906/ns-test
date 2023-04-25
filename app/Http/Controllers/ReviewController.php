<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

final class ReviewController extends Controller
{
    /**
     * @param ReviewRepository $reviewRepository
     */
    public function __construct(
        public readonly ReviewRepository $reviewRepository
    ) {}

    /**
     * @param StoreReviewRequest $request
     * @return ReviewResource
     */
    public function store(StoreReviewRequest $request): ReviewResource
    {
        return new ReviewResource(
            $this->reviewRepository->create(
                [
                    ...$request->validated(),
                    ...['user_id' => Auth::id()]
                ]
            )
        );
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ReviewResource::collection(
            $this->reviewRepository->index()
        );
    }
}
