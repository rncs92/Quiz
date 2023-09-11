<?php declare(strict_types=1);

namespace Vendon\Repository\User;

use Vendon\Models\User;

interface UserRepository
{
    public function save(User $user): void;

    public function getById(int $userId): User;
}