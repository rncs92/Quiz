<?php declare(strict_types=1);

namespace Vendon\Services\Quiz\Show;

use Vendon\Models\Quiz;
use Vendon\Repository\Quiz\QuizRepository;

class ShowPDOQuizService
{
    private QuizRepository $quizRepository;

    public function __construct(QuizRepository $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    public function handle(int $quizId): Quiz
    {
        return $this->quizRepository->byId($quizId);
    }
}