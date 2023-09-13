<?php declare(strict_types=1);

namespace Vendon\Services\User\Login;

use Vendon\Models\User;
use Vendon\Repository\User\UserRepository;

class LoginPDOUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(string $email, string $password): ?User
    {
        return $this->userRepository->login($email, $password);
    }
}