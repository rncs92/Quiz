<?php declare(strict_types=1);

namespace Vendon\Services\Quiz\Store;

use Vendon\Models\UserAnswer;

class StorePDOAnswerResponse
{
    private UserAnswer $answer;

    public function __construct(UserAnswer $answer)
    {
        $this->answer = $answer;
    }

    public function getAnswer(): UserAnswer
    {
        return $this->answer;
    }
}