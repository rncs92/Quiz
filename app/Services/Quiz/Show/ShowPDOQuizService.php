<?php declare(strict_types=1);

namespace Vendon\Services\Quiz\Show;

use Vendon\Repository\Quiz\QuizRepository;

class ShowPDOQuizService
{
    private QuizRepository $quizRepository;

    public function __construct(QuizRepository $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    public function handle(ShowPDOQuizRequest $request): ShowPDOQuizResponse
    {
        $quiz = $this->quizRepository->byId($request->getQuizId());
        //var_dump($request->getQuizId());die;
        return new ShowPDOQuizResponse($quiz);
    }
}