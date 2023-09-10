<?php declare(strict_types=1);

namespace Vendon\Models;

class Question
{

    private int $questionId;
    private string $question;
    private string $correctAnswer;
    private string $answer1;
    private string $answer2;
    private ?string $answer3;
    private ?string $answer4;
    private ?string $answer5;

    public function __construct(
        int    $questionId,
        string $question,
        string $correctAnswer,
        string $answer1,
        string $answer2,
        string $answer3 = null,
        string $answer4 = null,
        string $answer5 = null
    )
    {

        $this->questionId = $questionId;
        $this->question = $question;
        $this->answer1 = $answer1;
        $this->answer2 = $answer2;
        $this->answer3 = $answer3;
        $this->answer4 = $answer4;
        $this->answer5 = $answer5;
        $this->correctAnswer = $correctAnswer;
    }

    public function getQuestionId(): int
    {
        return $this->questionId;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function getCorrectAnswer(): string
    {
        return $this->correctAnswer;
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
}