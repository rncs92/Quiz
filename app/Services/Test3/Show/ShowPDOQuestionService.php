<?php declare(strict_types=1);

namespace Vendon\Services\Test3\Show;

use Vendon\Exceptions\ResourceNotFoundException;
use Vendon\Repository\Test\TestRepository;

class ShowPDOQuestionService
{
    private TestRepository $testRepository;

    public function __construct(TestRepository $testRepository)
    {

        $this->testRepository = $testRepository;
    }

    public function handle(): array
    {
        try {
            return $this->testRepository->allQuestions();
        } catch (ResourceNotFoundException $exception) {
            return [];
        }
    }
}