<?php declare(strict_types=1);

namespace Vendon\Models;

class Answer
{
    private string $answer;

    public function __construct(
        string $answer
    )
    {
        $this->answer = $answer;
    }

    public function getAnswer(): string
    {
        return $this->answer;
    }
}