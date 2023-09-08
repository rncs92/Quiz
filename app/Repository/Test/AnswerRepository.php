<?php declare(strict_types=1);

namespace Vendon\Repository\Test;

interface AnswerRepository
{
    public function all(): array;

    public function byQuestionId(int $questionId): array;
}
