<?php declare(strict_types=1);

namespace Vendon\Services\User\Authorization;

class AuthorizePDOUserRequest
{
    private string $username;
    private string $test;

    public function __construct(
        string $username,
        string $test
    )
    {
        $this->username = $username;
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
}