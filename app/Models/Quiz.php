<?php declare(strict_types=1);

namespace Vendon\Models;

class Quiz
{
    private string $title;
    private int $createdBy;
    private string $questions;
    private ?int $id;

    public function __construct(
        string $title,
        int    $createdBy,
        string  $questions,
        int    $id = null
    )
    {
        $this->title = $title;
        $this->createdBy = $createdBy;
        $this->questions = $questions;
        $this->id = $id;
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }
}