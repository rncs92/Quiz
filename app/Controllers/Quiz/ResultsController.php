<?php declare(strict_types=1);

namespace Vendon\Controllers\Quiz;

use Vendon\Core\Session;
use Vendon\Core\TwigView;
use Vendon\Models\Answer;
use Vendon\Models\Question;
use Vendon\Services\Quiz\Show\ShowPDOQuizService;
use Vendon\Services\UserAnswer\Show\ShowPDOUserAnswerService;

class ResultsController
{
    private ShowPDOQuizService $quizService;
    private ShowPDOUserAnswerService $userAnswerService;

    public function __construct(
        ShowPDOQuizService       $quizService,
        ShowPDOUserAnswerService $userAnswerService
    )
    {
        $this->quizService = $quizService;
        $this->userAnswerService = $userAnswerService;
    }

    public function index(): TwigView
    {
        if(!Session::get('user')) {
            return new TwigView('Errors/notAuthorized', []);
        }


        $user = Session::get('user');
        $userName = substr($user->getName(), 0, -1);
        $userId = $user->getUserId();

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
        $correctAnswers = Answer::createQuestionAnswersArray($correctAnswers);

        $userAnswerJSON = $this->userAnswerService->handle($userId, $quizId);
        $userAnswers = json_decode($userAnswerJSON->getAnswers(), true);


        $correctAnswerCount = 0;
        $totalQuestions = 0;
        foreach ($correctAnswers as $key => $correctAnswer) {
            $totalQuestions++;
            if ($correctAnswer === $userAnswers[$key]) {
                $correctAnswerCount++;
            }
        }

        return new TwigView('Quiz/results', [
            'user' => $userName,
            'questions' => $questions,
            'correctAnswers' => $correctAnswers,
            'userAnswers' => $userAnswers,
            'totalQuestions' => $totalQuestions,
            'correctAnswerCount' => $correctAnswerCount
        ]);
    }
}