<?php declare(strict_types=1);

namespace Vendon\Services\User\Register;

class RegisterPDOUserRequest
{
    private string $name;
    private string $surname;
    private string $email;
    private string $password;
    private string $confirmPassword;

    public function __construct(
        string $name,
        string $surname,
        string $email,
        string $password,
        string $confirmPassword
    )
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }
}