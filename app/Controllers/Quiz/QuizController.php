<?php declare(strict_types=1);

namespace Vendon\Controllers\Quiz;

use Vendon\Core\TwigView;
use Vendon\Models\Question;
use Vendon\Services\Quiz\Show\ShowPDOQuizService;

class QuizController
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
        $quizId = (int)$_SESSION['quiz_id'];
        $quiz = $this->quizService->handle($quizId);
        $questionsJSON = json_decode($quiz->getQuestions(), true);

        $questions = [];
        foreach ($questionsJSON as $question) {
            $questions[] = Question::createFromArray($question);
        }

        return new TwigView('Quiz/quiz', [
            'quiz' => $quiz,
            'questions' => $questions
        ]);
    }
}