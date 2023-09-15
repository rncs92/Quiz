<?php declare(strict_types=1);

namespace Vendon\Controllers\Quiz;

use Vendon\Core\TwigView;
use Vendon\Services\Quiz\Index\IndexPDOQuizService;

class ShowController
{
    private IndexPDOQuizService $quizService;

    public function __construct(
        IndexPDOQuizService $quizService
    )
    {
        $this->quizService = $quizService;
    }

    public function index(): TwigView
    {
        $questions = $this->quizService->handle();

        return new TwigView("Question/quiz", [
            'questions' => $questions,
        ]);
    }

}