<?php declare(strict_types=1);

namespace Vendon\Repository\User;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use Vendon\Core\Database;
use Vendon\Models\User;
use Vendon\Models\UserAnswer;

class PDOUserRepository implements UserRepository
{
    private QueryBuilder $queryBuilder;
    private Connection $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
        $this->queryBuilder = $this->connection->createQueryBuilder();
    }

    public function save(User $user): void
    {
        $queryBuilder = $this->queryBuilder;
        $queryBuilder
            ->insert('users')
            ->values(
                [
                    'name' => '?',
                    'surname' => '?',
                    'email' => '?',
                    'password' => '?',
                ]
            )
            ->setParameter(0, $user->getName())
            ->setParameter(1, $user->getSurname())
            ->setParameter(2, $user->getEmail())
            ->setParameter(3, $user->getPassword());

        $queryBuilder->executeQuery();

        $user->setUserId((int)$this->connection->lastInsertId());
    }

    public function login(string $email, string $password): ?User
    {
        $queryBuilder = $this->queryBuilder;
        $user = $queryBuilder->select('*')
            ->from('users')
            ->where('email = ?')
            ->setParameter(0, $email)
            ->fetchAssociative();

        return $this->buildUserModel($user);
    }

    public function byEmail(string $email): ?User
    {
        $queryBuilder = $this->queryBuilder;
        $user = $queryBuilder->select('*')
            ->from('users')
            ->where('email = ?')
            ->setParameter(0, $email)
            ->fetchAssociative();

        if (!$user) {
            return null;
        }

        return $this->buildUserModel($user);
    }

    public function getById(int $userId): User
    {
        $queryBuilder = $this->queryBuilder;
        $user = $queryBuilder
            ->select('*')
            ->from('users')
            ->where('user_id = ?')
            ->setParameter(0, $userId)
            ->fetchAssociative();

        return $this->buildUserModel($user);
    }

    public function saveAnswer(UserAnswer $userAnswer): void
    {
        $queryBuilder = $this->queryBuilder;
        $queryBuilder
            ->insert('userAnswers')
            ->values(
                [
                    'user_id' => '?',
                    'quiz_id' => '?',
                    'answers' => '?',
                ]
            )
            ->setParameter(0, $userAnswer->getUserId())
            ->setParameter(1, $userAnswer->getQuizId())
            ->setParameter(2, $userAnswer->getAnswers());

        $queryBuilder->executeQuery();
    }

    public function getAnswer(int $userId, int $quizId): UserAnswer
    {
        $queryBuilder = $this->queryBuilder;
        $userAnswer = $queryBuilder
            ->select('*')
            ->from('userAnswers')
            ->where('user_id = ?')
            ->andWhere('quiz_id = ?')
            ->setParameter(0, $userId)
            ->setParameter(1, $quizId)
            ->fetchAssociative();

        return $this->buildUserAnswerModel($userAnswer);
    }

    private function buildUserModel($user): User
    {
        return new User(
            $user['name'],
            $user['surname'],
            $user['email'],
            $user['password'],
            (int)$user['user_id']
        );
    }

    private function buildUserAnswerModel($userAnswer): UserAnswer
    {
        return new UserAnswer(
            (int) $userAnswer['user_id'],
            (int)$userAnswer['quiz_id'],
            $userAnswer['answers'],
            (int)$userAnswer['id']
        );
    }
}