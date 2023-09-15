<?php declare(strict_types=1);

namespace Vendon\Services\Quiz\Create;

use Vendon\Models\Question;
use Vendon\Models\Quiz;
use Vendon\Repository\Quiz\QuizRepository;

class CreatePDOQuizService
{
    private QuizRepository $quizRepository;

    public function __construct(QuizRepository $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    public function handle(CreatePDOQuizRequest $request): CreatePDOQuizResponse
    {
        $questionsData = [];
        foreach ($request->getQuestions() as $questionRequest) {
            $question = new Question(
                $questionRequest['text'],
                $questionRequest['answers'],
                $questionRequest['correct']
            );

            $questionData = [
                'text' => $question->getQuestionText(),
                'answers' => $question->getAnswers(),
                'correct' => $question->getCorrectAnswer(),
            ];

            $questionsData[] = $questionData;
        }

        $jsonQuestions = json_encode($questionsData);

        $quiz = new Quiz(
            $request->getTitle(),
            $request->getCreatedBy(),
            $jsonQuestions
        );

        $this->quizRepository->save($quiz);
        return new CreatePDOQuizResponse($quiz);
    }
}