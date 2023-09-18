<?php declare(strict_types=1);

namespace Vendon\Repository\User;

use Vendon\Models\User;
use Vendon\Models\UserAnswer;

interface UserRepository
{
    public function save(User $user): void;

    public function login(string $email, string $password): ?User;

    public function byEmail(string $email): ?User;

    public function getById(int $userId): User;

    public function saveAnswer(UserAnswer $userAnswer): void;

    public function getAnswer(int $userId, int $quizId): UserAnswer;

    public function getAnswerByUserId(int $userId): UserAnswer;

}