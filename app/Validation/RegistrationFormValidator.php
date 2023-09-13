<?php declare(strict_types=1);

namespace Vendon\Validation;

use Vendon\Exceptions\ValidationException;
use Vendon\Repository\User\UserRepository;

class RegistrationFormValidator
{
    private array $errors = [];
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function validateForm(array $fields = []): void
    {
        //Base info check
        if (strlen($fields['name']) < 2) {
            $this->errors['name'][] = 'Vārdam ir jābūt vismaz 2 simbolus garam';
        }

        if (strlen($fields['surname']) < 2) {
            $this->errors['surname'][] = 'Uzvārdam ir jābūt vismaz 2 simbolus garam';
        }

        //Email check
        if (strlen($fields['email']) < 2) {
            $this->errors['email'][] = 'Lūdzu ievadiet epastu';
        }

        $email = $this->userRepository->byEmail($fields['email']);

        if ($email) {
            $this->errors['email'][] = 'User with this email already exists';
        }

        //Password check
        if (strlen($fields['password']) < 7) {
            $this->errors['password'][] = 'Parolei jābūt vismaz 7 simbolus garai';
        }

        if ($fields['password'] !== $fields['confirm_password']) {
            $this->errors['password'][] = 'Paroles nesakrīt, lūdzu mēģiniet vēlreiz';
        }
        if (count($this->errors) > 0) {
            $_SESSION['errors'] = $this->errors;

            throw new ValidationException('Please fill in the fields!');
        }
    }
}
