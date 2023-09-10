<?php declare(strict_types=1);

namespace Vendon\Repository\Test;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use Vendon\Core\Database;
use Vendon\Models\Question;

class PDOTestRepository implements TestRepository
{
    private QueryBuilder $queryBuilder;
    private Connection $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
        $this->queryBuilder = $this->connection->createQueryBuilder();
    }

    public function allQuestions(): array
    {
        $queryBuilder = $this->queryBuilder;
        $questions = $queryBuilder
            ->select('*')
            ->from('test3')
            ->fetchAllAssociative();

        $questionCollection = [];

        foreach ($questions as $question) {
            $questionCollection[] = $this->buildQuestionModel($question);
        }

        return $questionCollection;
    }


    public function byQuestionId(int $questionId): array
    {
        $queryBuilder = $this->queryBuilder;
        $questions = $queryBuilder
            ->select('*')
            ->from('test3')
            ->where('question_id = ?')
            ->setParameter(0, $questionId)
            ->fetchAllAssociative();
        $questionCollection = [];

        foreach ($questions as $question) {
            $questionCollection[] = $this->buildQuestionModel($question);
        }

        return $questionCollection;
    }

    public function save()
    {

    }

    private function buildQuestionModel($question): Question
    {
        return new Question(
            (int)$question['question_id'],
            $question['question'],
            $question['answer1'],
            $question['answer2'],
            $question['answer3'],
            $question['answer4'],
            $question['answer5'],
            $question['correct_answer'],
        );
    }

}