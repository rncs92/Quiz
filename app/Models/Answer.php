<?php declare(strict_types=1);

namespace Vendon\Models;

class Answer
{
    private int $answerId;
    private int $questionId;
    private string $answer1;
    private string $answer2;
    private ?string $answer3;
    private ?string $answer4;
    private ?string $answer5;
    private string $correctAnswer;

    public function __construct(
        int     $answerId,
        int     $questionId,
        string  $answer1,
        string  $answer2,
        ?string $answer3,
        ?string $answer4,
        ?string $answer5,
        string  $correctAnswer
    )
    {
        $this->answerId = $answerId;
        $this->questionId = $questionId;
        $this->answer1 = $answer1;
        $this->answer2 = $answer2;
        $this->answer3 = $answer3;
        $this->answer4 = $answer4;
        $this->answer5 = $answer5;
        $this->correctAnswer = $correctAnswer;
    }

    public function getAnswerId(): int
    {
        return $this->answerId;
    }

    public function getQuestionId(): int
    {
        return $this->questionId;
    }

    public function getAnswer1(): string
    {
        return $this->answer1;
    }

    public function getAnswer2(): string
    {
        return $this->answer2;
    }

    public function getAnswer3(): ?string
    {
        return $this->answer3;
    }

    public function getAnswer4(): ?string
    {
        return $this->answer4;
    }

    public function getAnswer5(): ?string
    {
        return $this->answer5;
    }

    public function getCorrectAnswer(): string
    {
        return $this->correctAnswer;
    }
}