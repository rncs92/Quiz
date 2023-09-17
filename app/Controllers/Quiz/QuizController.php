<?php declare(strict_types=1);

namespace Vendon\Controllers\Quiz;

use Vendon\Core\Redirect;
use Vendon\Core\Session;
use Vendon\Core\TwigView;
use Vendon\Models\Question;
use Vendon\Services\Quiz\Show\ShowPDOQuizService;
use Vendon\Services\UserAnswer\Create\CreatePDOUserAnswerRequest;
use Vendon\Services\UserAnswer\Create\CreatePDOUserAnswerService;

class QuizController
{
    private ShowPDOQuizService $quizService;
    private CreatePDOUserAnswerService $answerService;

    public function __construct(
        ShowPDOQuizService         $quizService,
        CreatePDOUserAnswerService $answerService
    )
    {
        $this->quizService = $quizService;
        $this->answerService = $answerService;
    }

    public function index(): TwigView
    {
        $quizId = (int)$_SESSION['quiz_id'];
        $quiz = $this->quizService->handle($quizId);
        $questionsJSON = json_decode($quiz->getQuestions(), true);

        $questions = [];
        foreach ($questionsJSON as $question) {
            $questions[] = Question::createFromArray($question);
        }
        //var_dump($questions);die;
        return new TwigView('Quiz/quiz', [
            'quiz' => $quiz,
            'questions' => $questions
        ]);
    }

    public function store(): Redirect
    {
        $user = Session::get('user');
        $userId = $user->getUserId();

        $quizId = Session::get('quiz_id');

        $this->answerService->handle(
            new CreatePDOUserAnswerRequest(
                $userId,
                (int)$quizId,
                $_POST
            )
        );

        return new Redirect('/results');
    }
}