<?php declare(strict_types=1);

namespace Vendon\Services\User\Show;

use Vendon\Repository\User\UserRepository;

class ShowPDOUserAnswersService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(): array
    {
        return $this->userRepository->getUserAnswers($_SESSION['user_id']);
    }
}