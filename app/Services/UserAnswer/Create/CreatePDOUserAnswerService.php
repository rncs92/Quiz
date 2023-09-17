<?php declare(strict_types=1);

namespace Vendon\Services\UserAnswer\Create;

use Vendon\Models\UserAnswer;
use Vendon\Repository\User\UserRepository;

class CreatePDOUserAnswerService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(CreatePDOUserAnswerRequest $request): CreatePDOUserAnswerResponse
    {
        $userAnswer = new UserAnswer(
            $request->getUserId(),
            $request->getQuizId(),
            $request->getAnswers()
        );

        $this->userRepository->saveAnswer($userAnswer);

        return new CreatePDOUserAnswerResponse($userAnswer);
    }
}