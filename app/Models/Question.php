<?php declare(strict_types=1);

namespace Vendon\Models;

class Question
{
    private int $quizId;
    private int $questionId;
    private string $questionText;
    private array $answers;
    private string $correctAnswer;

    public function __construct(
        int    $quizId,
        int    $questionId,
        string $questionText,
        array  $answers,
        string $correctAnswer
    )
    {
        $this->quizId = $quizId;
        $this->questionId = $questionId;
        $this->questionText = $questionText;
        $this->answers = $answers;
        $this->correctAnswer = $correctAnswer;
    }

    public function getQuizId(): int
    {
        return $this->quizId;
    }

    public function getQuestionId(): int
    {
        return $this->questionId;
    }

    public function getQuestionText(): string
    {
        return $this->questionText;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }

    public function getCorrectAnswer(): string
    {
        return $this->correctAnswer;
    }
}
