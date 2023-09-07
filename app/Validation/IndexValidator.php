<?php declare(strict_types=1);

namespace Vendon\Validation;

use Vendon\Exceptions\IndexException;
use Vendon\Repository\UserRepository;

class IndexValidator
{
    private array $errors = [];

    public function __construct()
    {
    }

    public function validateIndex(array $fields = []): void
    {
        if (strlen($fields['username']) < 3) {
            $this->errors['username'][] = 'Username must be at least 3 symbols long!';
        }

        if (count($this->errors) > 0) {
            $_SESSION['errors'] = $this->errors;

            throw new IndexException('Please fill the fields!');
        }
    }
}
