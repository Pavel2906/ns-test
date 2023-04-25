<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Models\Answer;

interface AnswerRepositoryInterface {
    /**
     * @param array $data
     * @return Answer
     */
    public function create(array $data): Answer;
}
