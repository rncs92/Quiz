<?php declare(strict_types=1);

namespace Vendon\Controllers\Quiz;

use Vendon\Core\Redirect;
use Vendon\Core\Session;
use Vendon\Core\TwigView;
use Vendon\Services\Quiz\Show\ShowPDOQuestionService;
use Vendon\Services\Quiz\Store\StorePDOAnswerRequest;
use Vendon\Services\Quiz\Store\StorePDOAnswerService;

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

        if (!Session::get('test')) {
            return new TwigView('Errors/notAuthorized', []);
        }

        $questions = $this->questionService->handle();

        return new TwigView("Quiz/quiz", [
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

        return new Redirect('Quiz/results');
    }
}