<?php declare(strict_types=1);

namespace Vendon\Services\Quiz\Create;

class CreatePDOQuizRequest
{
    private string $title;
    private int $createdBy;
    private array $questions;

    public function __construct(
        string $title,
        int    $createdBy,
        array  $questions
    )
    {
        $this->title = $title;
        $this->createdBy = $createdBy;
        $this->questions = $questions;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCreatedBy(): int
    {
        return $this->createdBy;
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }
}