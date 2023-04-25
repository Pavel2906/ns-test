<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswerRequest;
use App\Http\Resources\AnswerResource;
use App\Repositories\AnswerRepository;
use Illuminate\Support\Facades\Auth;

final class AnswerController extends Controller
{
    /**
     * @param AnswerRepository $answerRepository
     */
    public function __construct(
        public readonly AnswerRepository $answerRepository
    ) {}

    /**
     * @param StoreAnswerRequest $request
     * @return AnswerResource
     */
    public function store(StoreAnswerRequest $request): AnswerResource
    {
        return new AnswerResource(
            $this->answerRepository
                ->create(
                    [
                        ...$request->validated(),
                        ...['user_id' => Auth::id()],
                    ]
                )
        );
    }
}
