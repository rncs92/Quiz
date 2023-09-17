<?php declare(strict_types=1);

namespace Vendon\Services\UserAnswer\Create;

use Vendon\Models\Answer;
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
        $answersData = [];
        foreach($request->getAnswers() as $answerRequest) {
            $answer = new Answer(
                $answerRequest['answer']
            );

            $answerData = [
                'answer' => $answer->getAnswer()
            ];

            $answersData[] = $answerData;
        }

        $jsonAnswers = json_encode($answersData);

        $userAnswer = new UserAnswer(
            $request->getUserId(),
            $request->getQuizId(),
            $jsonAnswers
        );

        $this->userRepository->saveAnswer($userAnswer);

        return new CreatePDOUserAnswerResponse($userAnswer);
    }
}