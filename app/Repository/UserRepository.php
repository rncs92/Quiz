<?php declare(strict_types=1);

namespace Vendon\Repository;

use Vendon\Models\User;

interface UserRepository
{
    public function save(User $user): void;
}