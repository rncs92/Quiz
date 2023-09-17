<?php declare(strict_types=1);

namespace Vendon\Services\Quiz\Index;

use Vendon\Repository\Quiz\QuizRepository;

class IndexPDOQuizService
{
    private QuizRepository $testRepository;

    public function __construct(QuizRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function handle(): array
    {
        return $this->testRepository->all();
    }
}