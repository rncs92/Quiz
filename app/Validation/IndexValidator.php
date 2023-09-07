<?php declare(strict_types=1);

namespace Vendon\Validation;


use Vendon\Exceptions\ValidationException;

class IndexValidator
{
    private array $errors = [];

    public function __construct()
    {
    }

    public function validateIndex(array $fields = []): void
    {
        if (strlen($fields['username']) < 2) {
            $this->errors['username'][] = 'Vārdam ir jābūt vismaz 2 simbols garam!';
        }

        if (!strlen($fields['tests'])) {
            $this->errors['tests'][] = 'Lūdzu izvēlieties testu!';
        }

        if (count($this->errors) > 0) {
            $_SESSION['errors'] = $this->errors;

            throw new ValidationException('Please fill in the fields!');
        }
    }
}
