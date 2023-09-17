<?php declare(strict_types=1);

namespace Vendon\Services\UserAnswer\Create;

class CreatePDOUserAnswerRequest
{
    private int $userId;
    private int $quizId;
    private array $answers;

    public function __construct(
        int   $userId,
        int   $quizId,
        array $answers
    )
    {
        $this->userId = $userId;
        $this->quizId = $quizId;
        $this->answers = $answers;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getQuizId(): int
    {
        return $this->quizId;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }
}