<?php declare(strict_types=1);

namespace Vendon\Repository\User;

use Vendon\Models\UserAnswer;
use Vendon\Models\User;

interface UserRepository
{
    public function save(User $user): void;

    public function login(string $email, string $password): ?User;

    public function getById(int $userId): User;

    public function getUserAnswers(int $userId): array;
}