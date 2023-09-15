<?php declare(strict_types=1);

namespace Vendon\Services\Quiz\Show;

class ShowPDOQuizRequest
{
    private string $title;
    private int $createdBy;
    private string $questions;
    private int $quizId;

    public function __construct(
        string $title,
        int    $createdBy,
        string $questions,
        int $quizId
    )
    {
        $this->title = $title;
        $this->createdBy = $createdBy;
        $this->questions = $questions;
        $this->quizId = $quizId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCreatedBy(): int
    {
        return $this->createdBy;
    }

    public function getQuestions(): string
    {
        return $this->questions;
    }

    public function getQuizId(): int
    {
        return $this->quizId;
    }
}