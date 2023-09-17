<?php declare(strict_types=1);

namespace Vendon\Models;

class Question
{
    private string $questionText;
    private array $answers;
    private string $correctAnswer;
    private ?int $quizId;

    public function __construct(
        string $questionText,
        array  $answers,
        string $correctAnswer,
        int    $quizId = null
    )
    {
        $this->questionText = $questionText;
        $this->answers = $answers;
        $this->correctAnswer = $correctAnswer;
        $this->quizId = $quizId;
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

    public function getQuizId(): ?int
    {
        return $this->quizId;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['text'],
            $data['answers'],
            $data['correct']
        );
    }
}
