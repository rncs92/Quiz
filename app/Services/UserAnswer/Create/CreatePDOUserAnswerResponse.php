<?php declare(strict_types=1);

namespace Vendon\Services\UserAnswer\Create;

use Vendon\Models\UserAnswer;

class CreatePDOUserAnswerResponse
{
    private UserAnswer $userAnswer;

    public function __construct(UserAnswer $userAnswer)
    {
        $this->userAnswer = $userAnswer;
    }

    public function getUserAnswer(): UserAnswer
    {
        return $this->userAnswer;
    }
}