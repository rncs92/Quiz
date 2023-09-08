<?php declare(strict_types=1);

namespace Vendon\Models;

class Question
{
    private string $question;
    private bool $isActive;
    private int $questionId;

    public function __construct(
        string $question,
        bool   $isActive,
        int    $questionId
    )
    {
        $this->question = $question;
        $this->isActive = $isActive;
        $this->questionId = $questionId;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function getQuestionId(): int
    {
        return $this->questionId;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }
}