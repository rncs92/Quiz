<?php declare(strict_types=1);

namespace Vendon\Services\Quiz\Show;

use Vendon\Models\Quiz;

class ShowPDOQuizResponse
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