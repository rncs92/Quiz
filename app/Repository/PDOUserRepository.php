<?php declare(strict_types=1);

namespace Vendon\Repository;

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
                    'username' => '?',
                    'test' => '?'
                ]
            )
            ->setParameter(0, $user->getUsername())
            ->setParameter(1, $user->getTest());

        $queryBuilder->executeQuery();

        $user->setUserId((int)$this->connection->lastInsertId());
    }
}