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
        $questions = [];

        foreach ($request->getQuestions() as $questionRequest) {
            $question = new Question(
                $questionRequest['question_text'],
                $questionRequest['answers'],
                $questionRequest['correct_answer']
            );
            $questions[] = $question;
        }

        $quiz = new Quiz(
            $request->getTitle(),
            $request->getCreatedBy(),
            $questions
        );

        $this->quizRepository->save($quiz);
        return new CreatePDOQuizResponse($quiz);
    }
}