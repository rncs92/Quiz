<?php declare(strict_types=1);

namespace Vendon\Repository\Quiz;

use Vendon\Models\Answer;

interface TestRepository
{
    public function allQuestions(): array;

    public function byQuestionId(int $questionId): array;

    public function save(Answer $answer, int $userId): void;
}
