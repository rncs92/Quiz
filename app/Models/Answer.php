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

    public static function createQuestionAnswersArray(array $indexedAnswers): array
    {
        $questionAnswers = [];

        foreach ($indexedAnswers as $index => $answer) {
            $questionAnswers["question" . ($index + 1) . "_answer"] = $answer;
        }

        return $questionAnswers;
    }
}