<?php declare(strict_types=1);

namespace Vendon\Services\Test3\Store;

use Vendon\Models\Answer;
use Vendon\Repository\Test\TestRepository;

class StorePDOAnswerService
{
    private TestRepository $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function handle(StorePDOAnswerRequest $request): StorePDOAnswerResponse
    {
        $answer = new Answer(
            $request->getAnswer1(),
            $request->getAnswer2(),
            $request->getAnswer3(),
            $request->getAnswer4(),
            $request->getAnswer5(),
            $request->getAnswer6(),
            $request->getAnswer7(),
            $request->getAnswer8(),
            $request->getAnswer9(),
            $request->getAnswer10(),
        );

        $userId = $_SESSION['user_id'];

        $this->testRepository->save($answer, $userId);

        return new StorePDOAnswerResponse($answer);
    }
}