<?php declare(strict_types=1);

namespace Vendon\Repository\Quiz;

use Vendon\Models\Quiz;

interface QuizRepository
{
    public function save(Quiz $quiz): void;

    public function all(): array;

    public function byId(int $quizId): Quiz;
}
