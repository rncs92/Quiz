<?php declare(strict_types=1);

namespace Vendon\Repository\Test;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use Vendon\Core\Database;
use Vendon\Models\Answer;

class PDOAnswerRepository implements AnswerRepository
{
    private QueryBuilder $queryBuilder;
    private Connection $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
        $this->queryBuilder = $this->connection->createQueryBuilder();
    }

    public function all()
    {
        $queryBuilder = $this->queryBuilder;
        $answers = $queryBuilder
            ->select('*')
            ->from('test3_answers')
            ->fetchAllAssociative();

        $answerCollection = [];

        foreach ($answers as $answer) {
            $answerCollection[] = $this->buildModel($answer);
        }

        return $answerCollection;
    }

    private function buildModel($answer): Answer
    {
        return new Answer(
            (int)$answer['answer_id'],
            (int)$answer['question_id'],
            $answer['answer1'],
            $answer['answer2'],
            $answer['answer3'],
            $answer['answer4'],
            $answer['answer5'],
            $answer['correct_answer_index'],
        );
    }
}