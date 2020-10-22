<?php

namespace DemoComplex\Exceptions;

use Exception;

class InvalidImaginaryPart extends Exception
{

    public function __construct($value)
    {
        $this->value = $value;
        parent::__construct("Invalid complex imaginary part: {$this->value}");
    }
}