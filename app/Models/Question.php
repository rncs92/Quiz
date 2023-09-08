<?php declare(strict_types=1);

namespace Vendon\Models;

class Question
{
    private string $question;
    private int $questionId;

    public function __construct(
        string $question,
        int    $questionId
    )
    {
        $this->question = $question;
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

}