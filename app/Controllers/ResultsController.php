<?php declare(strict_types=1);

namespace Vendon\Controllers;

use Vendon\Core\TwigView;
use Vendon\Models\Question;
use Vendon\Services\Test\Show\ShowPDOQuestionService;
use Vendon\Services\User\Show\ShowPDOUserAnswersService;
use Vendon\Services\User\Show\ShowPDOUserService;

class ResultsController
{
    private ShowPDOUserService $userService;
    private ShowPDOQuestionService $questionService;
    private ShowPDOUserAnswersService $answersService;

    public function __construct(
        ShowPDOUserService        $userService,
        ShowPDOQuestionService    $questionService,
        ShowPDOUserAnswersService $answersService
    )
    {
        $this->userService = $userService;
        $this->questionService = $questionService;
        $this->answersService = $answersService;
    }

    public function index(): TwigView
    {
        $user = $this->userService->handle();
        $userName = substr($user->getUsername(), 0, -1);

        $userAnswers = $this->answersService->handle();
        $questions = $this->questionService->handle();
        $correctAnswers = [];

        $correctAnswersCount = 0;
        $totalQuestions = count($userAnswers);

        foreach ($questions as $question) {
            /** @var Question $question */
            $correctAnswers[] = $question->getCorrectAnswer();
        }

        foreach ($correctAnswers as $correctAnswer) {
            foreach ($userAnswers as $answer) {
                if ($correctAnswer === $answer) {
                    $correctAnswersCount++;
                }
            }
        }

        return new TwigView('results', [
            'userName' => $userName,
            'total' => $totalQuestions,
            'correctAnswers' => $correctAnswersCount
        ]);
    }
}