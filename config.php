<?php declare(strict_types=1);

use Vendon\Repository\PDOUserRepository;
use Vendon\Repository\UserRepository;

return [
    'classes' => [
        UserRepository::class => new PDOUserRepository(),
    ],
];
