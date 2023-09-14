<?php declare(strict_types=1);

namespace Vendon\Services\Quiz\Show;

use Vendon\Exceptions\ResourceNotFoundException;
use Vendon\Repository\Quiz\QuizRepository;

class ShowPDOQuestionService
{
    private QuizRepository $testRepository;

    public function __construct(QuizRepository $testRepository)
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