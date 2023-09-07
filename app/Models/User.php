<?php declare(strict_types=1);

namespace Vendon\Models;

class User
{
    private string $username;
    private string $test;
    private int $userId;


    public function __construct(
        string $username,
        string $test,
        int    $userId
    )
    {
        $this->username = $username;
        $this->userId = $userId;
        $this->test = $test;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getTest(): string
    {
        return $this->test;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }
}
