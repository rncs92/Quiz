<?php declare(strict_types=1);

namespace Vendon\Controllers;

use Vendon\Core\TwigView;
use Vendon\Services\Test3\Show\ShowPDOAnswerService;
use Vendon\Services\Test3\Show\ShowPDOQuestionService;

class TestController
{
    private ShowPDOQuestionService $questionService;
    private ShowPDOAnswerService $answerService;

    public function __construct(
        ShowPDOQuestionService $questionService,
        ShowPDOAnswerService  $answerService
    )
    {
        $this->questionService = $questionService;
        $this->answerService = $answerService;
    }

    public function index():TwigView
    {
        return new TwigView('Tests/test1', []);
    }

    public function index2():TwigView
    {
        return new TwigView('Tests/test2', []);
    }

    public function index3():TwigView
    {
        $questions = $this->questionService->handle();
        $answers = $this->answerService->handle();

        return new TwigView('Tests/test3', [
           'questions' => $questions,
            'answers' => $answers
        ]);
    }
}