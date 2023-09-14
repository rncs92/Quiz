<?php declare(strict_types=1);

namespace Vendon\Services\Quiz\Create;

use Vendon\Models\Quiz;

class CreatePDOQuizResponse
{
    private Quiz $quiz;

    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    public function getQuiz(): Quiz
    {
        return $this->quiz;
    }
}