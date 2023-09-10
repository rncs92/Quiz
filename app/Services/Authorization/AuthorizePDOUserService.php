<?php declare(strict_types=1);

namespace Vendon\Services\Authorization;

use Vendon\Core\Session;
use Vendon\Models\User;
use Vendon\Repository\User\UserRepository;

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