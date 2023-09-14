<?php declare(strict_types=1);

namespace Vendon\Models;

class UserAnswer
{
    private int $id;
    private int $userId;
    private int $quizId;
    private array $answers;

    public function __construct(
        int   $id,
        int   $userId,
        int   $quizId,
        array $answers
    )
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->quizId = $quizId;
        $this->answers = $answers;
    }

    public function getId(): int
    {
        return $this->id;
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