<?php declare(strict_types=1);

namespace Vendon\Controllers\Index;

use Vendon\Core\Session;
use Vendon\Core\TwigView;
use Vendon\Models\Quiz;
use Vendon\Services\Quiz\Show\ShowPDOQuizService;
use Vendon\Services\User\Show\ShowPDOUserService;

class IndexController
{
    private ShowPDOQuizService $quizService;
    private ShowPDOUserService $userService;

    public function __construct(
        ShowPDOQuizService $quizService,
        ShowPDOUserService $userService
    )
    {
        $this->quizService = $quizService;
        $this->userService = $userService;
    }

    public function index(): TwigView
    {
        if (!Session::get('user')) {
            return new TwigView('User/login', []);
        }

        $quizzes = $this->quizService->handle();
        $users = [];

        foreach ($quizzes as $quiz) {
            /** @var Quiz $quiz */
            $users[] = $this->userService->handle($quiz->getCreatedBy());
        }

        return new TwigView('index', [
            'quizzes' => $quizzes,
            'users' => $users
        ]);
    }
}