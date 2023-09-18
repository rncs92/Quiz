<?php declare(strict_types=1);

namespace Vendon\Controllers\Quiz;

use Vendon\Core\Session;
use Vendon\Core\TwigView;
use Vendon\Models\Question;
use Vendon\Services\Quiz\Show\ShowPDOQuizService;

class ResultsController
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
        $user = Session::get('user');
        $userName = substr($user->getName(), 0, -1);

        $quizId = (int)Session::get('quiz_id');
        $quiz = $this->quizService->handle($quizId);
        $questionsJSON = json_decode($quiz->getQuestions(), true);

        $questions = [];
        foreach ($questionsJSON as $question) {
            $questions[] = Question::createFromArray($question);
        }

        $correctAnswers = [];
        foreach ($questions as $question) {
            $correctAnswers[] = $question->getCorrectAnswer();
        }





        return new TwigView('Quiz/results', [
            'user' => $userName
        ]);
    }
}