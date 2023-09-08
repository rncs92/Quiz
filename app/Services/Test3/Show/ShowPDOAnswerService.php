<?php declare(strict_types=1);

namespace Vendon\Services\Test3\Show;

use Vendon\Exceptions\ResourceNotFoundException;
use Vendon\Repository\Test\AnswerRepository;

class ShowPDOAnswerService
{
    private AnswerRepository $answerRepository;

    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    public function handle(int $questionId): array
    {
        try {
            return $this->answerRepository->byQuestionId($questionId);
        } catch (ResourceNotFoundException $exception) {
            return [];
        }
    }
}