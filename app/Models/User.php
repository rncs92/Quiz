<?php declare(strict_types=1);

namespace Vendon\Models;

class User
{
    private string $name;
    private string $surname;
    private string $email;
    private string $password;
    private string $confirmPassword;
    private ?int $userId;

    public function __construct(
        string $name,
        string $surname,
        string $email,
        string $password,
        int    $userId = null
    )
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->userId = $userId;
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

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): void
    {
        $this->userId = $userId;
    }

}
