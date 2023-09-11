<?php declare(strict_types=1);

namespace Vendon\Controllers;

use Vendon\Core\Redirect;
use Vendon\Core\TwigView;
use Vendon\Services\Test3\Show\ShowPDOQuestionService;
use Vendon\Services\Test3\Store\StorePDOAnswerRequest;
use Vendon\Services\Test3\Store\StorePDOAnswerService;

class TestController
{
    private ShowPDOQuestionService $questionService;
    private StorePDOAnswerService $answerService;

    public function __construct(
        ShowPDOQuestionService $questionService,
        StorePDOAnswerService  $answerService
    )
    {
        $this->questionService = $questionService;
        $this->answerService = $answerService;
    }

    public function index(): TwigView
    {
        $questions = $this->questionService->handle();

        return new TwigView("Tests/test", [
            'questions' => $questions,
        ]);
    }

    public function storeTestAnswers(): Redirect
    {
        $this->answerService->handle(
            new StorePDOAnswerRequest(
                $_POST['question1_answer'],
                $_POST['question2_answer'] ?? null,
                $_POST['question3_answer'] ?? null,
                $_POST['question4_answer'] ?? null,
                $_POST['question5_answer'] ?? null,
                $_POST['question6_answer'] ?? null,
                $_POST['question7_answer'] ?? null,
                $_POST['question8_answer'] ?? null,
                $_POST['question9_answer'] ?? null,
                $_POST['question10_answer'] ?? null,
            )
        );

        return new Redirect('/results');
    }
}