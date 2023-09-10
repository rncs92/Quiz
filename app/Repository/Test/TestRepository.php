<?php declare(strict_types=1);

namespace Vendon\Repository\Test;

interface TestRepository
{
    public function allQuestions(): array;

    public function byQuestionId(int $questionId): array;
}
