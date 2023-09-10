<?php declare(strict_types=1);

namespace Vendon\Services\Test3\Store;

use Vendon\Models\Answer;

class StorePDOAnswerResponse
{
    private Answer $answer;

    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }

    public function getAnswer(): Answer
    {
        return $this->answer;
    }
}