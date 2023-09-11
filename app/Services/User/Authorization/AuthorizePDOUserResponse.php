<?php declare(strict_types=1);

namespace Vendon\Services\User\Authorization;

use Vendon\Models\User;

class AuthorizePDOUserResponse
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}