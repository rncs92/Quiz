<?php declare(strict_types=1);

namespace Vendon\Models;

class Answer
{
    private string $answer1;
    private string $answer2;
    private string $answer3;
    private string $answer4;
    private string $answer5;
    private string $answer6;
    private string $answer7;
    private string $answer8;
    private string $answer9;
    private string $answer10;

    public function __construct(
        string $answer1,
        string $answer2,
        string $answer3,
        string $answer4,
        string $answer5,
        string $answer6,
        string $answer7,
        string $answer8,
        string $answer9,
        string $answer10
    )
    {
        $this->answer1 = $answer1;
        $this->answer2 = $answer2;
        $this->answer3 = $answer3;
        $this->answer4 = $answer4;
        $this->answer5 = $answer5;
        $this->answer6 = $answer6;
        $this->answer7 = $answer7;
        $this->answer8 = $answer8;
        $this->answer9 = $answer9;
        $this->answer10 = $answer10;
    }

    public function getAnswer1(): string
    {
        return $this->answer1;
    }

    public function getAnswer2(): string
    {
        return $this->answer2;
    }

    public function getAnswer3(): string
    {
        return $this->answer3;
    }

    public function getAnswer4(): string
    {
        return $this->answer4;
    }

    public function getAnswer5(): string
    {
        return $this->answer5;
    }

    public function getAnswer6(): string
    {
        return $this->answer6;
    }

    public function getAnswer7(): string
    {
        return $this->answer7;
    }

    public function getAnswer8(): string
    {
        return $this->answer8;
    }

    public function getAnswer9(): string
    {
        return $this->answer9;
    }

    public function getAnswer10(): string
    {
        return $this->answer10;
    }
}