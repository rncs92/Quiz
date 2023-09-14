<?php declare(strict_types=1);

namespace Vendon\Controllers\Quiz;

use Vendon\Core\Redirect;
use Vendon\Core\Session;
use Vendon\Core\TwigView;
use Vendon\Services\Quiz\Create\CreatePDOQuizRequest;
use Vendon\Services\Quiz\Create\CreatePDOQuizService;

class CreateController
{
    private CreatePDOQuizService $quizService;

    public function __construct(
        CreatePDOQuizService $quizService
    )
    {
        $this->quizService = $quizService;
    }

    public function index(): TwigView
    {
        if (!Session::get('user')) {
            return new TwigView('User/login', []);
        }
        return new TwigView('Quiz/create', []);
    }

    public function store(): Redirect
    {
        $userId = Session::get('user');

        $this->quizService->handle(
            new CreatePDOQuizRequest(
                $_POST['title'],
                (int)$userId,
                $_POST['questions']
            )
        );

        return new Redirect('/index');
    }
}