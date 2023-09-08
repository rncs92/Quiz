<?php declare(strict_types=1);

use Vendon\Repository\Test\AnswerRepository;
use Vendon\Repository\Test\PDOAnswerRepository;
use Vendon\Repository\Test\PDOQuestionRepository;
use Vendon\Repository\Test\QuestionRepository;
use Vendon\Repository\User\PDOUserRepository;
use Vendon\Repository\User\UserRepository;

return [
    'classes' => [
        UserRepository::class => new PDOUserRepository(),
        QuestionRepository::class => new PDOQuestionRepository(),
        AnswerRepository::class => new PDOAnswerRepository()
    ],
];
