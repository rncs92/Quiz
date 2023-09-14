<?php declare(strict_types=1);

namespace Vendon\Repository\Quiz;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use Vendon\Core\Database;
use Vendon\Models\Quiz;
use Vendon\Models\UserAnswer;
use Vendon\Models\Question;

class PDOQuizRepository implements QuizRepository
{
    private QueryBuilder $queryBuilder;
    private Connection $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
        $this->queryBuilder = $this->connection->createQueryBuilder();
    }

    public function save(Quiz $quiz): void
    {
        $queryBuilder = $this->queryBuilder;
        $queryBuilder
            ->insert('quizzes')
            ->values(
                [
                    'title' => '?',
                    'created_by' => '?',
                    'questions' => '?',
                ]
            )
            ->setParameter(0, $quiz->getTitle())
            ->setParameter(1, $quiz->getCreatedBy())
            ->setParameter(2, $quiz->getQuestions());

        $queryBuilder->executeQuery();

        $quiz->setId((int)$this->connection->lastInsertId());
    }

    private function buildModel($quiz): Quiz
    {
        return new Quiz(
            $quiz['title'],
            $quiz['created_by'],
            $quiz['questions'],
            (int)$quiz['id']
        );
    }
}