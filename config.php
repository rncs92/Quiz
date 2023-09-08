<?php declare(strict_types=1);

use Vendon\Repository\User\PDOUserRepository;
use Vendon\Repository\User\UserRepository;

return [
    'classes' => [
        UserRepository::class => new PDOUserRepository(),
    ],
];
