<?php declare(strict_types=1);

namespace Vendon\Service\Authorization;

use Vendon\Models\User;
use Vendon\Repository\UserRepository;

class AuthorizePDOUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(AuthorizePDOUserRequest $request): AuthorizePDOUserResponse
    {
        $user = new User(
            $request->getUsername(),
            $request->getTest()
        );

        $this->userRepository->save($user);

        return new AuthorizePDOUserResponse($user);
    }
}