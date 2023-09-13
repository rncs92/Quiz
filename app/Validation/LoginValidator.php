<?php declare(strict_types=1);

namespace Vendon\Validation;

use Vendon\Exceptions\LoginException;
use Vendon\Repository\User\UserRepository;

class LoginValidator
{
    private array $errors = [];
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function validateLogin(array $fields = []): void
    {

        $user = $this->userRepository->byEmail($fields['email']);

        if (!$user) {
            $this->errors['email'][] = "User with this email doesn't exist!";
        } elseif (!isset($fields['password'])) {
            $this->errors['password'][] = 'Password field is required!';
        } elseif (strlen($fields['password']) < 7) {
            $this->errors['password'][] = 'Password must be at least 7 characters long!';
        } elseif (!password_verify($fields['password'], $user->getPassword())) {
            $this->errors['password'][] = 'Wrong password entered!';
        }

        if (count($this->errors) > 0) {
            $_SESSION['errors'] = $this->errors;

            throw new LoginException('Login failed');
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}