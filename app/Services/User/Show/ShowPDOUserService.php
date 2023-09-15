<?php declare(strict_types=1);

namespace Vendon\Services\User\Show;

use Vendon\Models\User;
use Vendon\Repository\User\UserRepository;

class ShowPDOUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(int $userId): User
    {
        return $this->userRepository->getById($userId);
    }
}