<?php declare(strict_types=1);

namespace Vendon\Validation;

use Vendon\Exceptions\IndexException;

class IndexValidator
{
    private array $errors = [];

    public function __construct()
    {
    }

    public function validateIndex(array $fields = []): void
    {
        if (strlen($fields['username']) < 2) {
            $this->errors['username'][] = 'Name must be at least 2 symbols long!';
        }

        if (count($this->errors) > 0) {
            $_SESSION['errors'] = $this->errors;

            throw new IndexException('Please fill in the fields!');
        }
    }
}
