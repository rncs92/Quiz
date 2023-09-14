<?php declare(strict_types=1);

namespace Vendon\Services\Quiz\Create;

use Vendon\Core\Session;
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
        $quiz = new Quiz(
            $request->getTitle(),
            $request->getCreatedBy(),
            $request->getQuestions()
        );

         $this->quizRepository->save($quiz);
        return new CreatePDOQuizResponse($quiz);
    }
}