<?php declare(strict_types=1);

namespace Vendon\Controllers\Index;

use Vendon\Core\Session;
use Vendon\Core\TwigView;
use Vendon\Models\Quiz;
use Vendon\Services\Quiz\Index\IndexPDOQuizService;
use Vendon\Services\User\Show\ShowPDOUserService;

class IndexController
{
    private IndexPDOQuizService $quizService;
    private ShowPDOUserService $userService;

    public function __construct(
        IndexPDOQuizService $quizService,
        ShowPDOUserService  $userService
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

    public function chooseQuiz()
    {
        //each quiz, has ID
        //redirect to quiz by ID, one view for all

    }
}