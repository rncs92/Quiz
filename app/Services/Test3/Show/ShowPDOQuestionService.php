<?php declare(strict_types=1);

namespace Vendon\Services\Test3\Show;

use Vendon\Exceptions\ResourceNotFoundException;
use Vendon\Repository\Test\QuestionRepository;

class ShowPDOQuestionService
{
    private QuestionRepository $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {

        $this->questionRepository = $questionRepository;
    }

    public function handle(): array
    {
        try {
            return $this->questionRepository->all();
        } catch (ResourceNotFoundException $exception) {
            return [];
        }
    }
}