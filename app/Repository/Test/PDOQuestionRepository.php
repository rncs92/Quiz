<?php declare(strict_types=1);

namespace Vendon\Repository\Test;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use Vendon\Core\Database;
use Vendon\Models\Question;

class PDOQuestionRepository
{
    private QueryBuilder $queryBuilder;
    private Connection $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
        $this->queryBuilder = $this->connection->createQueryBuilder();
    }

    public function all(): array
    {
        $queryBuilder = $this->queryBuilder;
        $questions = $queryBuilder
            ->select('*')
            ->from('test3')
            ->fetchAllAssociative();

        $questionCollection = [];

        foreach ($questions as $question) {
            $questionCollection[] = $this->buildModel($question);
        }

        return $questionCollection;
    }

    private function buildModel($test): Question
    {
        return new Question(
            $test['question_id'],
            $test['question'],
            $test['is_active'],
        );
    }
}