<?php declare(strict_types=1);

namespace Vendon\Services\UserAnswer\Show;

use Vendon\Models\UserAnswer;
use Vendon\Repository\User\UserRepository;

class ShowPDOUserAnswerService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(int $userId, int $quizId): UserAnswer
    {
        return $this->userRepository->getAnswer($userId, $quizId);
    }
}