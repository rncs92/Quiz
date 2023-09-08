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

    public function handle(): array
    {
        try {
            return $this->answerRepository->all();
        } catch (ResourceNotFoundException $exception) {
            return [];
        }
    }
}