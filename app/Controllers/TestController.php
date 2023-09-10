<?php declare(strict_types=1);

namespace Vendon\Controllers;

use Vendon\Core\Redirect;
use Vendon\Core\TwigView;
use Vendon\Services\Test3\Show\ShowPDOAnswerService;
use Vendon\Services\Test3\Show\ShowPDOQuestionService;
use Vendon\Services\Test3\Store\StorePDOAnswerRequest;
use Vendon\Services\Test3\Store\StorePDOAnswerResponse;
use Vendon\Services\Test3\Store\StorePDOAnswerService;

class TestController
{
    private ShowPDOQuestionService $questionService;
    private StorePDOAnswerService $answerService;


    public function __construct(
        ShowPDOQuestionService $questionService,
        StorePDOAnswerService $answerService
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

    public function indexTest3():TwigView
    {
        $questions = $this->questionService->handle();

        return new TwigView('Tests/test3', [
           'questions' => $questions,
        ]);
    }

    public function storeAnswersTest3(): Redirect
    {
        var_dump($_POST);die;
        $this->answerService->handle(
            new StorePDOAnswerRequest(
                $_POST['answer1'],
                $_POST['answer2'],
                $_POST['answer3'],
                $_POST['answer4'],
                $_POST['answer5'],
                $_POST['answer6'],
                $_POST['answer7'],
                $_POST['answer8'],
                $_POST['answer9'],
                $_POST['answer10'],
            )
        );

        return new Redirect('/');
    }
}