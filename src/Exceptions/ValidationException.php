<?php

namespace Notific\PhpSdk\Exceptions;

use Exception;

class ValidationException extends Exception
{
    /**
     * @var array
     */
    public $errors = [];

    /**
     * ValidationException constructor.
     * @param array $errors
     */
    public function __construct(array $errors)
    {
        parent::__construct('The given data failed to pass validation.');

        $this->errors = $errors;
    }

    /**
     * The array of errors.
     *
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }
}
