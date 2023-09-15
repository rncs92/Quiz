<?php declare(strict_types=1);

namespace Vendon\Controllers\Quiz;

use Vendon\Core\Redirect;
use Vendon\Core\Session;
use Vendon\Core\TwigView;
use Vendon\Services\Quiz\Show\ShowPDOQuizService;

class ShowController
{
    private ShowPDOQuizService $quizService;

    public function __construct(
       ShowPDOQuizService $quizService
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