<?php declare(strict_types=1);

namespace Vendon\Repository\User;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use Vendon\Core\Database;
use Vendon\Models\User;

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

        return $this->buildModel($user);
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

        return $this->buildModel($user);
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

        return $this->buildModel($user);
    }


    private function buildModel($user): User
    {
        return new User(
            $user['name'],
            $user['surname'],
            $user['email'],
            $user['password'],
            (int)$user['user_id']
        );
    }
}