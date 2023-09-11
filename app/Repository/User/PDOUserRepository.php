<?php declare(strict_types=1);

namespace Vendon\Repository\User;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use Vendon\Core\Database;
use Vendon\Core\Session;
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
                    'username' => '?',
                    'test' => '?'
                ]
            )
            ->setParameter(0, $user->getUsername())
            ->setParameter(1, $user->getTest());

        $queryBuilder->executeQuery();

        Session::put('user_id', (int)$this->connection->lastInsertId());
        $user->setUserId((int)$this->connection->lastInsertId());
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
            $user['username'],
            $user['test'],
            (int)$user['user_id']
        );
    }
}