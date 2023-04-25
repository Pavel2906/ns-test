<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

final class UserRepository implements UserRepositoryInterface
{

    /**
     * @param User $user
     */
    public function __construct(
        public readonly User $user,
    ) {}

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        return $this->user::create($data);
    }
}
