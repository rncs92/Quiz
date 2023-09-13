<?php declare(strict_types=1);

namespace Vendon\Services\User\Register;

use Vendon\Models\User;
use Vendon\Repository\User\UserRepository;

class RegisterPDOUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(RegisterPDOUserRequest $request): RegisterPDOUserResponse
    {
        $user = new User(
            $request->getName(),
            $request->getSurname(),
            $request->getEmail(),
            password_hash($request->getPassword(), PASSWORD_DEFAULT)
        );

        $this->userRepository->save($user);

        return new RegisterPDOUserResponse($user);
    }
}