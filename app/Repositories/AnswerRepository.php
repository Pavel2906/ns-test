<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Answer;
use App\Repositories\Interfaces\AnswerRepositoryInterface;

final class AnswerRepository implements AnswerRepositoryInterface
{
    /**
     * @param Answer $answer
     */
    public function __construct(
        public readonly Answer $answer,
    ) {}

    /**
     * @param array $data
     * @return Answer
     */
    public function create(array $data): Answer
    {
        return $this->answer::create($data);
    }
}
