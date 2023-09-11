<?php declare(strict_types=1);

namespace Vendon\Repository\Test;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use Vendon\Core\Database;
use Vendon\Models\Answer;
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
            ->from($_SESSION['test'])
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
            ->from($_SESSION['test'])
            ->where('question_id = ?')
            ->setParameter(0, $questionId)
            ->fetchAllAssociative();
        $questionCollection = [];

        foreach ($questions as $question) {
            $questionCollection[] = $this->buildQuestionModel($question);
        }

        return $questionCollection;
    }

    public function save(Answer $answer, int $userId): void
    {
        $queryBuilder = $this->queryBuilder;
        $queryBuilder
            ->update('users')
            ->set('answer1', '?')
            ->set('answer2', '?')
            ->set('answer3', '?')
            ->set('answer4', '?')
            ->set('answer5', '?')
            ->set('answer6', '?')
            ->set('answer7', '?')
            ->set('answer8', '?')
            ->set('answer9', '?')
            ->set('answer10', '?')
            ->where('user_id = ?')
            ->setParameter(0, $answer->getAnswer1())
            ->setParameter(1, $answer->getAnswer2())
            ->setParameter(2, $answer->getAnswer3())
            ->setParameter(3, $answer->getAnswer4())
            ->setParameter(4, $answer->getAnswer5())
            ->setParameter(5, $answer->getAnswer6())
            ->setParameter(6, $answer->getAnswer7())
            ->setParameter(7, $answer->getAnswer8())
            ->setParameter(8, $answer->getAnswer9())
            ->setParameter(9, $answer->getAnswer10())
            ->setParameter(10, $userId);

        $queryBuilder->executeStatement();
    }

    private function buildQuestionModel($question): Question
    {
        return new Question(
            (int)$question['question_id'],
            $question['question'],
            $question['correct_answer'],
            $question['answer1'],
            $question['answer2'],
            $question['answer3'],
            $question['answer4'],
            $question['answer5'],
        );
    }
}