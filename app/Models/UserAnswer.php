<?php declare(strict_types=1);

namespace Vendon\Models;

class UserAnswer
{
    private int $userId;
    private int $quizId;
    private string $answers;
    private ?int $id;

    public function __construct(
        int   $userId,
        int   $quizId,
        string $answers,
        int $id = null
    )
    {
        $this->userId = $userId;
        $this->quizId = $quizId;
        $this->answers = $answers;
        $this->id = $id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getQuizId(): int
    {
        return $this->quizId;
    }

    public function getAnswers(): string
    {
        return $this->answers;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }
}